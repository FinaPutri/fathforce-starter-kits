<?php
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

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


// fina
Route::resource('article-posts', PostController::class);

// Route::middleware('auth')->prefix('dashboard')->group(function () {

//     Route::get('/article-posts', [PostController::class, 'index'])->name('dashboard.article.posts');
//     Route::get('/article-post/add', [PostController::class, 'create'])->name('dashboard.article.posts.add');
//     Route::post('/post-saving', [PostController::class, 'store'])->name('dashboard.post-store');

//     // Route::get('/article-category', [CategoryController::class, 'index'])->name('.article.category');
//     // Route::post('/category-saving', [CategoryController::class, 'store'])->name('.category-store'); 
//     // Route::post('/category-update/{id}',[CategoryController::class, 'update'])->name('.category-update');
//     // Route::get('/category-delete/{id}',[CategoryController::class, 'destroy'])->name('.category-delete');

// });