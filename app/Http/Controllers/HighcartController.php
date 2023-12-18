<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HighcartController extends Controller
{
    public function index(){
        $product = Product::select(DB::raw('count(category_id) as total'))->groupBy('category_id')->pluck('total');
        $price = Product::select(DB::raw('sum(price) as total'))->groupBy('category_id')->pluck('total');
        $stock = Product::select(DB::raw('sum(stock) as total'))->groupBy('category_id')->pluck('total');

        if($product->isEmpty()){
            return view('dashboard', compact('product', 'price', 'stock'));

        }else{

            $keyboardProduct = $product[0];
            $keyboardPrice = $price[0];
            $keyboardStock = $stock[0];
            $mouseProduct = $product[1];
            $mousePrice = $price[1];
            $mouseStock = $stock[1];
            $headsetProduct = $product[2];
            $headsetPrice = $price[2];
            $headsetStock = $stock[2];
            return view('dashboard', compact('product', 'price', 'stock'));
        }


        // dd($product, $price, $stock);
    }
}
