<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        return view('product.product', compact('product', 'category'));

    }

    public function listproduct(){
        $product = Product::all();
        $category = Category::all();
        return view('product.listproduct', compact('product', 'category'));
    }

    public function create(){
        $category = Category::all();
        return view('product.create', compact('category'));
    }

    public function store(Request $request){
        // Storage::putFileAs('images', $request->image, $request->file('image')->getClientOriginalName());

        $request = Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock,
            'image' => $request->image->getClientOriginalName(),
        ]);
        return redirect()->route('product');
    }

    public function edit($id){
        $product = Product::find($id);
        $category = Category::all();
        return view('product.update', compact('product', 'category'));
    }

    public function update(Request $request, $id){

        $product = Product::where('id', $id)->update([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock,
            'image' => $request->image->getClientOriginalName(),
        ]);
        // DB::table('products')->where('id', $id)->update([
        //     'product_name' => $request->product_name,
        //     'category_id' => $request->category_id,
        //     'product_code' => $request->product_code,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'unit' => $request->unit,
        //     'discount_amount' => $request->discount_amount,
        //     'stock' => $request->stock,
        //     'image' => $request->image->getClientOriginalName(),
        // ]);
        return redirect()->route('product');
    }

    public function delete($id){
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product');
    }
}
