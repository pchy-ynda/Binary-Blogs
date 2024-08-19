<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

//Code that runs after sth is sent to the route but before it gets to the Controller

Route::middleware('web')->group(function () {

    /**
    *E.g. contact route: Tells Laravel to call the getContact method of the PagesController when the /contact URL is accessed.
    *Route::method(url, [controller::class, method]) 
    **/    

    Route::get('contact', [PagesController::class, 'getContact']); 
    Route::get('about', [PagesController::class, 'getAbout']);
    Route::get('/', [PagesController::class, 'getIndex']);
    Route::get('blog', [BlogController::class, 'getIndex'])->name('blog.index');
    Route::get('blog/{slug}', [BlogController::class, 'getSingle'])->name('blog.single');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('posts', PostController::class)->middleware('auth');;
    Route::resource('categories', CategoryController::class, ['except' => 'create'])->middleware('auth');;
    Route::resource('tags', TagController::class, ['except' => 'create'])->middleware('auth');;
});

require __DIR__.'/auth.php';
