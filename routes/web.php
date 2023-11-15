<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/home", function() {
    return view("home");
});
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/", [HomeController::class, "index"])->name("index");
//product
Route::get("/product", [App\Http\Controllers\ProductController::class, "index"])->name("product");
Route::get("/product/create", [App\Http\Controllers\ProductController::class, "create"])->name("product.create");
Route::post("/product/store", [App\Http\Controllers\ProductController::class, "store"])->name("product.store");
Route::get("/product/edit/{id}", [App\Http\Controllers\ProductController::class, "edit"])->name("product.edit");
Route::put("/product/{id}", [App\Http\Controllers\ProductController::class, "update"])->name("product.update");
Route::get("/product/delete/{id}", [App\Http\Controllers\ProductController::class, "delete"])->name("product.delete");

// Route::resource('product', App\Http\Controllers\ProductController::class);
