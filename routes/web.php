<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@Welcome');

Route::get('/NewsCat', 'NewsCatController@NewsCat');

Route::get('/login', 'LoginController@Login');

Route::get('/AddNews', 'AddNewsController@AddNews');
