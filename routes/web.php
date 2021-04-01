<?php

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

Route::redirect('/', '/login')->name('index');

Route::get('/home', \App\Http\Livewire\Home::class)->name('home');

Route::group(['middleware' => ['verified']], function () {

    Route::group(['prefix' => 'authors', 'as' => 'authors.'], function () {
        Route::get('/', \App\Http\Livewire\Author\Index::class)->name('index');
    });

    Route::group(['prefix' => 'books', 'as' => 'books.'], function () {
        Route::get('/', \App\Http\Livewire\Book\Index::class)->name('index');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', \App\Http\Livewire\User\Index::class)->name('index');
    });

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('/', \App\Http\Livewire\Role\Index::class)->name('index');
    });
});

