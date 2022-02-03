<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categoria;
use App\Client;
use App\Sale;
use App\Detail;
use App\Company;
use App\Page;
use App\Post;
use MercadoPago; 


class WebController extends Controller
{
    public $categories;
    public $company;

    public function __construct(){
        $this->categories = Categoria::where('visibility', '!=', 'oculto')->get();
        $this->company = Company::find(1);
    }

    public function index(){
        $page = Page::find(1);
        $products = Product::where('visibility', '!=', 'oculto')->get();

        return view('web.index',[
            'products'=>$products,
            'page' => $page,
            'categories' => $this->categories,
            'company' => $this->company
            
        ]);

    }

    public function order(Request $request){
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);
        $response = 0;

        //conexion a la sdk
       // MercadoPago\SDK::setAccessToken('TEST-898212763163006-012104-ec283e74cf0005ba15f09f4f461df006-191319841');
        MercadoPago\SDK::setAccessToken('APP_USR-6102228993420949-012120-b671b8328021800c05c2cc6e6a31e239-704927079');

        //validar si el cliente existe
        $clientExist = Client::where('document', $params->cliente->document)
                                ->orWhere('email', $params->cliente->email)
                                ->first();

        //sino crear el cliente
        if (!$clientExist) {
            $cliente = new Client();
            $cliente->name = $params->cliente->name;
            $cliente->type_document = $params->cliente->type_document;
            $cliente->document = $params->cliente->document;
            $cliente->phone = $params->cliente->phone;
            $cliente->email = $params->cliente->email;
            $cliente->address = $params->cliente->address;
            $cliente->reference = $params->cliente->reference;
            $cliente->neightborhood = $params->cliente->neightborhood;

            $cliente->save();

            // Crea un objeto de preferencia
            $preference = new MercadoPago\Preference();

            $preference->back_urls = array(
                "success" => route('web.procesar'),
                "failure" => route('web.procesar'),
                "pending" => route('web.procesar')
            );

            // Crea un ítem en la preferencia
            $item = new MercadoPago\Item();
            $item->title = 'Compra de '.$params->cliente->name;
            $item->quantity = 1;
            $item->unit_price = $params->total;
            $preference->items = array($item);
            $preference->save();

            //create sale
            $sale = new Sale();
            $sale->client_id = $cliente->id; 
            $sale->estado = 'pendiente'; 
            $sale->valor = $params->total; 
            $sale->forma_pago = $params->cliente->payment; 
            $sale->estado_pago = 'pendiente'; 
            $sale->preference_id = $preference->id;

            $sale->save();
            

            foreach ($params_array['compra'] as $key) {
                Detail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $key['productId'],
                    'quantity' => $key['productQuantity'],
                    'price' => $key['productPrice'],
                ]);

            }

            $dataResponse = [
                'code' => 200,
                'status' => 'success',
                'sale_id' => $sale->id,
                'cliente' => $cliente->name,
                'payment' => $sale->forma_pago,
                'preference_id' => $preference->id
            ];
            
        }else{

            // Crea un objeto de preferencia
            $preference = new MercadoPago\Preference();

            $preference->back_urls = array(
                "success" => route('web.procesar'),
                "failure" => route('web.procesar'),
                "pending" => route('web.procesar')
            );

            // Crea un ítem en la preferencia
            $item = new MercadoPago\Item();
            $item->title = 'Compra de '.$clientExist->name;
            $item->quantity = 1;
            $item->unit_price = $params->total;
            $preference->items = array($item);
            $preference->save();
            
            //generar la venta
            $sale = new Sale();
            $sale->client_id = $clientExist->id; 
            $sale->estado = 'pendiente'; 
            $sale->valor = $params->total; 
            $sale->forma_pago = $params->cliente->payment; 
            $sale->estado_pago = 'pendiente'; 
            $sale->preference_id = $preference->id;

            $sale->save();

            //registrar los detalles de la venta
            foreach ($params_array['compra'] as $key) {
                Detail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $key['productId'],
                    'quantity' => $key['productQuantity'],
                    'price' => $key['productPrice'],
                ]);

            }

            $dataResponse = [
                'code' => 200,
                'status' => 'success',
                'sale_id' => $sale->id,
                'cliente' => $clientExist->name,
                'payment' => $sale->forma_pago,
                'preference_id' => $preference->id 
            ];
            
        }                               


        return response()->json($dataResponse, 200);
    }

    public function procesar(Request $request){
        /* return $request->all(); */
        $page = Page::find(1);
        $preference_id = $request->input('preference_id');
        $collection_status = $request->input('collection_status');


        $sale = Sale::where('preference_id', $preference_id)->first();

        if ($sale) {
            $sale->estado_pago = $collection_status;
            $sale->update();

            $response = [
                'status' => 'success',
                'preference_id' => $preference_id,
                'status_sales' => $collection_status,
                'description' => 'Venta procesada'
            ];
        }else{
            $response = [
                'status' => 'error',
                'preference_id' => $preference_id,
                'status_sales' => $collection_status,
                'description' => 'El id de la preferncia no coincide'
            ];
        }

        //return response()->json($response, 200);
        return view('web.response-mp',[
            'categories' => $this->categories,
            'page' => $page,
            'company' => $this->company,
            'prefernce_id' => $preference_id,
            'collection_status' => $collection_status,
            'payment_status_detail' => $request->input('payment_status_detail')
        ]);

    }

    public function mercadopago($refernce_id){
        $page = Page::find(1);
        return view('web.mercadopago',[
            'company' => $this->company,
            'page' => $page,
            'categories' => $this->categories,
            'refernce_id' => $refernce_id
        ]);
    }


    public function productos(){
        $page = Page::find(2);
        $products = Product::where('visibility', '!=', 'oculto')
                            ->orderBy('id', 'desc')->paginate(16);

        return view('web.shop',[
            'company' => $this->company,
            'page' => $page,
            'products'=>$products,
            'categories' => $this->categories
            
        ]);

    }

    public function productosearch(Request $request){
        $page = Page::find(1);
        $search = $request->input('product');
        $products = Product::where('name', 'LIKE', '%'.$search.'%')
        ->where('visibility', '!=', 'oculto')
        ->paginate(16);

        /* echo $search;
        die(); */

        return view('web.shop',[
            'company' => $this->company,
            'page' => $page,
            'products'=>$products,
            'categories' => $this->categories
            
        ]);

    }

    public function producto($id){
        $page = Page::find(1);
        $product = Product::find($id);

        return view('web.single-product-details', [
            'company' => $this->company,
            'page' => $page,
            'product' => $product,
            'categories' => $this->categories
            
        ]);

    }

    public function productosCategoria($id){
        $page = Page::find(1);
        $products = Product::where('category_id', $id)
                            ->where('visibility', '!=', 'oculto')
                            ->paginate(16);

        return view('web.shop',[
            'company' => $this->company,
            'page' => $page,
            'products' => $products,
            'categories' => $this->categories
            
        ]);
    }

    public function checkout(){
        $page = Page::find(1);
        return view('web.checkout',[
            'company' => $this->company,
            'page' => $page,
            'categories' => $this->categories
            
        ]);

    }

    public function contact(){
        $page = Page::find(1);
        return view('web.contact',[
            'company' => $this->company,
            'page' => $page,
            'categories' => $this->categories
            
        ]);

    }

    public function blog(){
        $page = Page::find(3);
        $posts = Post::orderBy('id', 'desc')->paginate(12);

        return view('web.blog',[
            'company' => $this->company,
            'page' => $page,
            'categories' => $this->categories,
            'posts' => $posts
        ]);

    }

    public function postDetail($slug){
        $page = Page::find(3);
        $post = Post::where('slug', '=', $slug)->first();

        return view('web.blog-detail',[
            'company' => $this->company,
            'page' => $page,
            'categories' => $this->categories,
            'post' => $post
        ]);

    }

    //end class
}
