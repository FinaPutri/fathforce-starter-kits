<?php
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\GalleryController;
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

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::get('/', [FrontendController::class, 'index'])->name('home');
Auth::routes();

Route::get('/gallery', [GalleryController::class, 'index']);

Route::get('/gallery/{media}', [GalleryController::class, 'show']);

Route::get('/gallery',  function(){
    return view('gallery');
});

//route galery dan category
Route::resource('galery', GaleryController::class);

Route::resource('category', CategoryController::class);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
