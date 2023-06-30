<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FeatureImageController;
use App\Http\Controllers\TestController;
use App\Models\FeatureImage;

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

Route::get('/', function () {
    $images = FeatureImage::all()[0];
    return view('welcome', compact('images'));
});

Route::get('/admin', function () {



    return view('admin');
})->middleware(['auth']);;

Auth::routes();

Route::controller(FeatureImageController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/feature_images', 'index')->name('admin.feature_images.index');
    Route::post('admin/feature_images', 'save')->name('admin.feature_images.save.store');
});

Route::controller(TestController::class)->group(function () {
    Route::get('test', 'index')->name('test');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
