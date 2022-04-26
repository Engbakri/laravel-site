<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('abouts')->get();
    $portofolio = DB::table('multi_images')->get();
    return view('home',compact('brands','abouts','portofolio'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
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

// Portofolio
Route::get('/brands/images',[BrandController::class,'AllImages'])->name('brands.images');
Route::post('/brands/addimages',[BrandController::class,'storeImages'])->name('brands.storeimages');
Route::get('/brands/show/{id}',[BrandController::class,'show'])->name('brands.show');

// user logout 
Route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');

// Sliders 
Route::get('/sliders',[HomeController::class,'index'])->name('sliders');
Route::get('/sliders/create',[HomeController::class,'create'])->name('sliders.create');
Route::post('/sliders/add',[HomeController::class,'store'])->name('sliders.store');
Route::get('/sliders/edit/{id}',[HomeController::class,'edit'])->name('sliders.edit');
Route::post('/sliders/update/{id}',[HomeController::class,'update'])->name('sliders.update');
Route::get('/sliders/delete/{id}',[HomeController::class,'destroy'])->name('sliders.delete');

// About Page
Route::get('/abouts',[AboutController::class,'index'])->name('abouts');
Route::get('/abouts/create',[AboutController::class,'create'])->name('abouts.create');
Route::post('/abouts/add',[AboutController::class,'store'])->name('abouts.store');
Route::get('/abouts/edit/{id}',[AboutController::class,'edit'])->name('abouts.edit');
Route::post('/abouts/update/{id}',[AboutController::class,'update'])->name('abouts.update');
Route::get('/abouts/delete/{id}',[AboutController::class,'destroy'])->name('abouts.delete');
