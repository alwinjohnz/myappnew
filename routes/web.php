<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountController;

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
    return redirect('/products/create');
});


Route::resource('products', ProductController::class);
Route::resource('discounts', DiscountController::class);
Route::get('/discounts/{id}', array('as' => 'discount', 'uses' => 'DiscountController@create'));

