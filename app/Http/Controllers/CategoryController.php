<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all()->toArray();
        $categories = DB::table('product_categories')->get()->toArray();

        dd($categories);
    }
}
