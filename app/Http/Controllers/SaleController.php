<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Detail;

class SaleController extends Controller
{
    public function index(){
        $sales = Sale::orderBy('id', 'desc')->get();
        return view('voyager.sales.index', [
            'sales' => $sales
        ]);
    } 

    public function details($id){
        $details = Detail::where('sale_id', $id)->get();
        $sale = Sale::find($id);
        return view('voyager.sales.details', [
            'sale' => $sale,
            'details' => $details
        ]);
    }
    
}
