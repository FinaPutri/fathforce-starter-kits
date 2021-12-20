<?php
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;

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

// Route::get('/gallery', [GaleryController::class, 'index']);

// Route::get('/gallery/{media}', [GaleryController::class, 'show']);

// Route::get('/gallery',  function(){
//     return view('gallery');
// });

//route galery dan category
Route::resource('galery', GaleryController::class);

Route::resource('article-category', CategoryController::class);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


// fina
Route::resource('article-posts', PostController::class);
Route::resource('article', ArticleController::class);

// putri
Route::resource('gallery', GaleryController::class);
Route::get('/gallery/{media}', [GalleryController::class, 'show']);
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');