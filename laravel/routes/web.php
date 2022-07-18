<?php

use Illuminate\Support\Facades\Route;
use App\Models\Controller;

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

Route::get('/', "FilmController@showFilms")->name('films');
Route::get('myLibrary', "CabinetController@showMyLibrary")->middleware(['auth'])->name('myLibrary');
Route::get('film/{id}', "FilmController@showFilm")->name('film');
Route::post('addFilmToLibrary', "LibraryController@addFilmToMyLibrary")->middleware(['auth'])->name('addFilmToLibrary');
Route::post('deleteFilmFromLibrary', "LibraryController@deleteFilmFromLibrary")->middleware(['auth'])->name('deleteFilmFromLibrary');
Route::post('loadMoreFilms', "FilmController@loadMoreFilms")->name('loadMoreFilms');
Route::post('searchFilms', "FilmController@searchFilms")->name('searchFilms');

Route::get('friends', "CabinetController@showMyFriends")->middleware(['auth'])->name('friends');
Route::post('searchFriends', "CabinetController@searchFriends")->middleware(['auth'])->name('searchFriends');
Route::post('deleteFriend', "UserController@deletePersonFromFriendList")->middleware(['auth'])->name('deleteFriend');
Route::post('addFriend', "UserController@addPersonToFriendList")->middleware(['auth'])->name('addFriend');
Route::post('loadMoreMyFilms', "CabinetController@loadMoreMyFilms")->name('loadMoreMyFilms');
Route::post('shareFilmToFriend', "UserController@shareFilmToFriend")->middleware(['auth'])->name('shareFilmToFriend');

Route::get('chat', 'CabinetController@showChats')->middleware(['auth'])->name('chat');
Route::get('admin', 'AdminController@index')->middleware(['auth'])->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
