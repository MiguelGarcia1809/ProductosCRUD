<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::controller(ProductoController::class)->group(function(){
    Route::get('/listaProductos', 'index');
    Route::get('/agregarProducto', 'create');
    Route::get('/editarProducto/{id}', 'edit');
    Route::post('/guardarProducto','store');
    Route::delete('eliminarProducto/{id}', 'destroy');
    Route::patch("/actualizarProducto/{id}", "update");

});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[ProductoController::class,'index']);
});
