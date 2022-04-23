<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/categories',[CategoryController::class,'index'])->name('categories');
Route::post('/categories/add',[CategoryController::class,'store'])->name('categories.store');
Route::get('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');
Route::get('/categories/delete/{id}',[CategoryController::class,'destroy'])->name('categories.delete');

//brands 
Route::get('/brands',[BrandController::class,'index'])->name('brands');
Route::post('/brands/add',[BrandController::class,'store'])->name('brands.store');
Route::get('/brands/edit/{id}',[BrandController::class,'edit'])->name('brands.edit');
Route::post('/brands/update/{id}',[BrandController::class,'update'])->name('brands.update');
Route::get('/brands/delete/{id}',[BrandController::class,'destroy'])->name('brands.delete');