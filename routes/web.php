<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\LocaleController;
use \App\Http\Controllers\Admin\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Новости
 */
Route::group([
    'prefix' => 'news',
    'as' => 'news::'
], function() {

    Route::get('/', [NewsController::class, 'index'])
        ->name("categories");

    Route::get('/card/{news}', [NewsController::class, 'card'])
        ->where('news', '[0-9]+')
        ->name('card');

    Route::get('/{categoryId}', [NewsController::class, 'list'])
        ->where('id', '[0-9]+')
        ->name('list');

    Route::get('/source/{sourceId}', [NewsController::class, 'source'])
        ->where('id', '[0-9]+')
        ->name('source');
});

/**  Отзывы */

Route::group([
    'prefix' => 'feedback',
    'as' => 'feedback::'
], function() {
    Route::get('/create',[FeedbackController::class, 'create'])
        ->name('create');
    Route::post( '/save',[FeedbackController::class, 'save'])
        ->name('save');

});




/** Админка новостей */
Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
    'middleware' => ['auth']
], function () {
    Route::get('/', [AdminNewsController::class, 'index'] )
        ->name('index');
    Route::get('/create',[AdminNewsController::class, 'create'])
        ->name('create');
    Route::post( '/save',[AdminNewsController::class, 'save'])
        ->name('save');
    Route::get('/update/{id}',[AdminNewsController::class, 'update'])
        ->where('id', '[0-9]+')
        ->name('update');
    Route::get('/delete/{id}',[AdminNewsController::class, 'delete'])
        ->where('id', '[0-9]+')
        ->name('delete');

    /** Админка категорий */
    Route::get('/category', [AdminNewsController::class, 'indexCategory'] )
        ->name('indexCategory');
    Route::get('/category/create',[AdminNewsController::class, 'createCategory'])
        ->name('createCategory');
    Route::post( '/category/save',[AdminNewsController::class, 'saveCategory'])
        ->name('saveCategory');
    Route::get('/category/update/{id}',[AdminNewsController::class, 'updateCategory'])
        ->where('id', '[0-9]+')
        ->name('updateCategory');
    Route::get('/category/delete/{id}',[AdminNewsController::class, 'deleteCategory'])
        ->where('id', '[0-9]+')
        ->name('deleteCategory');

});


Route::get('/db', [\App\Http\Controllers\DbController::class, 'index']);

Route::match(['get', 'post'], '/admin/profile', [ProfileController::class, 'update'])
    ->name('admin:profile')
    ->middleware('auth');

Route::get('/locale/{lang}', [LocaleController::class, 'index'])
    ->where('lang','\w+')
    ->name('locale');


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
