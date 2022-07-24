<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/','ApiController@index')->name('api_index');
Route::get('/count_users','ApiController@getCountUsers')->name('getCountUsers');
Route::get('/count_films','ApiController@getCountFilms')->name('getCountFilms');
Route::get('/get_films/{skip}','ApiController@getFilms')->name('getFilms');
Route::get('/get_user/{id}','ApiController@getUser')->name('getUser');
