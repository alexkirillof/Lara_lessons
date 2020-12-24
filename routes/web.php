<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@Welcome')->name('Welcome');

Route::get('/NewsCat', 'NewsCatController@NewsCat')->name('NewsCat');

Route::get('/login', 'LoginController@Login')->name('Login');

Route::get('/AddNews', 'AddNewsController@AddNews')->name('AddNews');

Route::post('/AddNews/submit', 'AddNewsController@Add') ->name('AddNews-form');
