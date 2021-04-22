<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\AdminNewsController;


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

    Route::get('/card/{id}', [NewsController::class, 'card'])
        ->where('id', '[0-9]+')
        ->name('card');

    Route::get('/{categoryId}', [NewsController::class, 'list'])
        ->where('id', '[0-9]+')
        ->name('list');

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
], function () {
    Route::get('/', [AdminNewsController::class, 'index'] )
        ->name('index');
    Route::get('/create',[AdminNewsController::class, 'create'])
        ->name('create');
    Route::post( '/save',[AdminNewsController::class, 'save'])
        ->name('save');
    Route::get('/update',[AdminNewsController::class, 'update'])
        ->name('update');
    Route::get('/delete',[AdminNewsController::class, 'delete'])
        ->name('delete');
    Route::get('/card/{id}',[AdminNewsController::class, 'card'])
        ->where('id', '[0-9]+')
        ->name('card');
    Route::get('/{categoryId}', [AdminNewsController::class, 'list'])
        ->where('id', '[0-9]+')
        ->name('list');

});


Route::get('/db', [\App\Http\Controllers\DbController::class, 'index']);