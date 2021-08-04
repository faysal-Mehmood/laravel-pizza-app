<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// pizza routes
Route::get('/pizzas','App\Http\Controllers\PizzaController@index')->middleware('auth');
Route::post('/pizzas','App\Http\Controllers\PizzaController@store');
Route::get('pizzas/create', 'App\Http\Controllers\PizzaController@create');
Route::get('/pizzas/{id}', 'App\Http\Controllers\PizzaController@show')->middleware('auth');
Route::delete('/pizzas/{id}', 'App\Http\Controllers\PizzaController@destroy')->middleware('auth');


Auth::routes([
    'register'=> false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

