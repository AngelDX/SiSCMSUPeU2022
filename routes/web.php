<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\CrudCategory;
use App\Http\Livewire\CrudPost;
use App\Http\Livewire\IndexLivewire;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/',[IndexLivewire::class,'render'])->name('index');
Route::get('/productos',[PostController::class,'index'])->name('posts.index');
Route::get('category/{category}',[PostController::class,'category'])->name('posts.category');
Route::get('post/{post}',[PostController::class,'show'])->name('posts.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/categories',CrudCategory::class)->name('categories');
    Route::get('/posts',CrudPost::class)->name('posts');
    Route::get('/post-create',[CrudPost::class,'create'])->name('post-create');
    Route::post('/post-create',[CrudPost::class,'store']);
    Route::get('/post-edit/{post}',[CrudPost::class,'edit'])->name('post-edit');
    Route::put('/post-update/{post}',[CrudPost::class,'update'])->name('post-update');

    //Route::resource('posts',CrudPost::class)->names('admin.posts');
});


