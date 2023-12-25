<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()    {
        $category = Category::all();
        if(auth()->user()->can("view_category")){
            return view('category.category', compact('category'));
        }
        return abort(403, 'Unauthorized Page');
    }

    public function create(){
        $category = Category::all();
        if(auth()->user()->can("view_category")){
            return view('category.create', compact('category'));
        }
        return abort(403, 'Unauthorized Page');
    }

    public function store(Request $request){

        $validated = Validator::make($request->all(),[
            'category_name' => 'required | max:30',
        ],[
            'category_name.required' => 'Nama kategori harus diisi',
            'category_name.max' => 'Nama kategori maksimal 30 huruf',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated->errors());
        }

        $request = Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('category');
    }

    public function edit($id){
        $category = Category::find($id);
        if(auth()->user()->can("view_category")){
            return view('category.update', compact('category'));
        }
        return abort(403, 'Unauthorized Page');
    }

    public function update(Request $request){
        $validated = Validator::make($request->all(),[
            'category_name' => 'required | max:30',
        ],
        [
            'category_name.required' => 'Nama kategori harus diisi',
            'category_name.max' => 'Nama kategori maksimal 30 huruf',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated->errors());
        }

        $request = Category::where('id', $request->id)->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('category');
    }

    public function delete($id){
        $category = Category::find($id);
        if(auth()->user()->can("view_category")){
            $category->delete();
            return redirect()->route('category');
        }
        return abort(403, 'Unauthorized Page');
    }
}
