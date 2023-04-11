<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
Route::get('/home', function () {
    return view('home');
});
Route::prefix('categories')->group(function () {
//    Route::GET('/create', array(
//        'as' => 'categories.create',
//        'uses' => 'CategoryController@create'
//    ));
    Route::get('/',[CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/create', [CategoryController::class, 'create'])
        ->name('categories.create');
});

