<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HighcartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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



//login
Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "login"])->name("login.auth");
Route::get("/register", [RegisterController::class, "index"])->name("register");
Route::post("/register", [RegisterController::class, "store"])->name("register.store");
Route::get("/logout", [LoginController::class, "logout"])->name("logout");

Route::get("/listproduct",[App\Http\Controllers\ProductController::class, "listproduct"])->name("listproduct");

//product
Route::middleware('auth')->group(function(){
    Route::get("/", [HighcartController::class, "index"])->name("index");
    Route::get("/product", [ProductController::class, "index"])->name("product");
    Route::get("/product/create", [ProductController::class, "create"])->name("product.create");
    Route::post("/product/store", [ProductController::class, "store"])->name("product.store");
    Route::get("/product/edit/{id}", [ProductController::class, "edit"])->name("product.edit");
    Route::put("/product/{id}", [ProductController::class, "update"])->name("product.update");
    Route::get("/product/delete/{id}", [ProductController::class, "delete"])->name("product.delete");

});

