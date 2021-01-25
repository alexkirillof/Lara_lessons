<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@Welcome')->name('Welcome');

Route::get('/NewsCat', 'NewsCatController@NewsCat')->name('NewsCat');

Route::get('/login', 'LoginController@Login')->name('Login');

Route::get('/AddNews', 'AddNewsController@AddNews')->name('AddNews');

Route::post('/AddNews/submit', 'AddNewsController@Add')->name('AddNews-form');

// Route::get('/', function () {
//     return view('Welcome');
// })->name('home');

/**
 * Новости
 */

Route::group([
    'prefix' => 'news',
    'as' => 'news::',
], function () {
    Route::get('/',  [NewsController::class, 'index'])
        ->name('categories');

    Route::get('/card/{id}', [NewsController::class, 'newsCard'])
        ->name('card')
        ->where('id', '[0-9]+');

    Route::get('/{categoryId}', [NewsController::class, 'list'])
        ->name('list')
        ->where('categoryId', '[0-9]+');
});

/**
 * Админка новостей
 */
Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
    'namespace' => '\App\Http\Controllers\Admin'
], function () {
    Route::get('/', 'NewsController@index')
        ->name('index');

    Route::match(['get', 'post'], '/create', 'NewsController@create')
        ->name('create');

    Route::match(['post'], '/save', 'NewsController@save')
        ->name('save');

    Route::get('/update/{id}', 'NewsController@update')
        ->name('update');

    Route::get('/delete/{id}', 'NewsController@delete')
        ->name('delete');
});

Route::match(
    ['get', 'post'],
    '/admin/profile/update',
    '\App\Http\Controllers\Admin\ProfileController@update'
)->name('admin::profile::update');

Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/db', [\App\Http\Controllers\DbController::class, 'index']);


Route::group([
    'prefix' => 'admin/',
    'namespace' => '\App\Http\Controllers\Admin',
    'as' => 'admin::',
    'middleware' => ['auth', 'check_admin']
], function () use ($adminNewsRoutes) {
    $adminNewsRoutes();
    //Профиль
    Route::group([
        'prefix' => 'profile',
        'as' => 'profile::',
    ], function () {
        Route::post(
            'update',
            'ProfileController@update',
        )->name('update');

        Route::get(
            'show',
            'ProfileController@show',
        )->name('show');
    });

    Route::get("parser", [ParserController::class, 'index'])
        ->name('parser');
});

Route::group([
    'prefix' => 'social',
    'as' => 'social::',
], function () {
    Route::get('/login', [SocialController::class, 'loginVk'])
        ->name('login-vk');
    Route::get('/response', [SocialController::class, 'responseVk'])
        ->name('response-vk');
});
