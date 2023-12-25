<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class LandingController extends Controller
{
    public function index(){
        $product = Product::all();
        $category = Category::all();

        return view("landing", compact('product', 'category'));
    }
}
