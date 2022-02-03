<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suscribe;
use App\Product;
use App\Categoria;
use App\Client;
use App\Sale;
use App\Detail;
use App\Company;
use App\Page;
use App\Post;
use App\Quote;

class NotifyController extends Controller
{
    public $categories;
    public $company;

    public function __construct(){
        $this->categories = Categoria::all();
        $this->company = Company::find(1);
    }

    public function suscribe(Request $request){
        $suscribe = Suscribe::where('email', $request->input('email'))->count();

        if ($suscribe >= 1) {
            return redirect()->route('suscribe.thanks')->with(['alert' => 'Ya te encuentras registrado en nuestro boletin, proximamente recibiras premios y bonos de descuento para que hagas más compras...']);
        }else{
            $new = new Suscribe();
            $new->email = $request->input('email');
            $new->save();
            return redirect()->route('suscribe.thanks')->with(['success' => 'Gracias por suscribirte a nuestro boletin, queremos premiar tu fidelidad o regalarte bonos de descuento para tus compras...']);
        }
        
    }

    public function thanks(){
        $page = Page::find(4);
        $products = Product::all();

        return view('web.suscritos',[
            'products'=>$products,
            'page' => $page,
            'categories' => $this->categories,
            'company' => $this->company
            
        ]);
    }

    public function cotizar(){
        $page = Page::find(5);
        return view('web.cotizador',[
            'page' => $page,
            'categories' => $this->categories,
            'company' => $this->company
            
        ]);
    }

    public function quoteSave(Request $request){
        $quote = new Quote();
        $quote->name = $request->input('name');
        $quote->email = $request->input('email');
        $quote->phone = $request->input('phone');
        $quote->product = $request->input('type_product');
        $quote->description = $request->input('description');
        $quote->save();

        return redirect()->route('quote.thanks');

    }

    public function thanksQuote(){
        $page = Page::find(6);
        return view('web.thanks',[
            'page' => $page,
            'categories' => $this->categories,
            'company' => $this->company,
            'message' => 'Gracias por cotizar con Estitrando Lineas, estamos comprometidos con nuestros clientes, queremos brindarles los mejores canales para facilitar su experiencia de compra...'
            
        ]);
    }

}
