<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return response()->json($products);
    }

    public function show($id){
        $products = Product::find($id);
        return response()->json($products);
    }

    public function store(Request $request){
        $products = Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock,
        ]);
        if($products){
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $products
            ]);
        }
    }

    public function update(Request $request, $id){
        $products = Product::find($id)->update([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock,
        ]);
        if($products){
            $product = Product::find($id);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah',
                'data' => $product
            ]);
        }
    }

    public function destroy($id){
        $products = Product::find($id)->delete();
        return response()->json($products);
    }
}
