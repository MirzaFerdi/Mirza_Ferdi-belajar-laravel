<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        $validated = Validator::make($request->all(),[
            'product_name' => 'required | max:30',
            'product_code' => 'required | unique:products,product_code',
            'description' => ' required | max:125',
            'price' => 'required',
            'unit' => 'required | string | max:20',
            'discount_amount' => 'required',
            'stock' => 'required | max:10',
            'image' => 'image | mimes:jpeg,png,jpg,svg | max:2048',
        ], [
            'product_name.required' => 'Nama produk harus diisi',
            'product_name.max' => 'Nama produk maksimal 35 huruf',
            'product_code.required' => 'Kode produk harus diisi',
            'product_code.unique' => 'Kode produk tidak boleh sama',
            'description.required' => 'Deskripsi produk harus diisi',
            'description.max' => 'Deskripsi produk maksimal 125 huruf',
            'price.required' => 'Harga produk harus diisi',
            'unit.required' => 'Satuan produk harus diisi',
            'unit.string' => 'Satuan produk harus diisi dengan huruf',
            'unit.max' => 'Satuan produk maksimal 20 huruf',
            'discount_amount.required' => 'Diskon produk harus diisi',
            'stock.required' => 'Stok produk harus diisi',
            'stock.max' => 'Stok produk maksimal 10 digit',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $imgName = time().'.'.$request->image->extension();

        Storage::putFileAs('image', $request->image, $imgName);


        $request = Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'discount_amount' => $request->discount_amount,
            'stock' => $request->stock,
            'image' => $imgName,
        ]);
        return redirect()->route('product')->with('success', 'Product berhasi; ditambahkan.');
    }

    public function edit($id){
        $product = Product::find($id);
        $category = Category::all();
        return view('product.update', compact('product', 'category'));
    }

    public function update(Request $request, $id){

        $validated = Validator::make($request->all(),[
            'product_name' => 'required | max:30',
            'description' => ' required | max:125',
            'price' => 'required',
            'unit' => 'required | string | max:20',
            'discount_amount' => 'required',
            'stock' => 'required | max:10',
        ], [
            'product_name.required' => 'Nama produk harus diisi',
            'product_name.max' => 'Nama produk maksimal 35 huruf',
            'description.required' => 'Deskripsi produk harus diisi',
            'description.max' => 'Deskripsi produk maksimal 125 huruf',
            'price.required' => 'Harga produk harus diisi',
            'unit.required' => 'Satuan produk harus diisi',
            'unit.string' => 'Satuan produk harus diisi dengan huruf',
            'unit.max' => 'Satuan produk maksimal 20 huruf',
            'discount_amount.required' => 'Diskon produk harus diisi',
            'stock.required' => 'Stok produk harus diisi',
            'stock.max' => 'Stok produk maksimal 10 digit',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput();
        }

        if($request->hasFile('image')){
            $prevImage = Product::find($id)->image;

            Storage::delete('image/'.$prevImage);

            $imgName = time().'.'.$request->image->extension();

            Storage::putFileAs('image', $request->image, $imgName);

            $request = Product::where('id', $id)->update([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'product_code' => $request->product_code,
                'description' => $request->description,
                'price' => $request->price,
                'unit' => $request->unit,
                'discount_amount' => $request->discount_amount,
                'stock' => $request->stock,
                'image' => $imgName,
            ]);
        }else{
            $request = Product::where('id', $id)->update([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'product_code' => $request->product_code,
                'description' => $request->description,
                'price' => $request->price,
                'unit' => $request->unit,
                'discount_amount' => $request->discount_amount,
                'stock' => $request->stock,
            ]);
        }
        return redirect()->route('product')->with('success', 'Product berhasi; ditambahkan.');
    }

    public function delete($id){
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product');
    }
}
