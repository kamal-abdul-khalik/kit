<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', fn () => redirect(route('login')));
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', \App\Livewire\Home::class)->name('home');
    Route::get('/profile', \App\Livewire\Auth\Profile::class)->name('profile');
    Route::get('/logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts', \App\Livewire\Post\Index::class)->name('posts.index');
    Route::get('/posts/create', \App\Livewire\Post\Actions::class)->name('posts.create');
    Route::get('/posts/{post}/edit', \App\Livewire\Post\Actions::class)->name('posts.edit');
    Route::get('/categories', \App\Livewire\Category\Index::class)->name('categories.index');
});
