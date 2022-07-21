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
Route::get('film/{id}', "FilmController@showFilm")->name('film');
Route::post('loadMoreFilms', "FilmController@loadMoreFilms")->name('loadMoreFilms');
Route::post('searchFilms', "FilmController@searchFilms")->name('searchFilms');

Route::get('profile', "CabinetController@showProfile")->middleware(['auth'])->name('profile');
Route::get('editProfile', "CabinetController@editProfile")->middleware(['auth'])->name('editProfile');

Route::get('myLibrary', "CabinetController@showMyLibrary")->middleware(['auth'])->name('myLibrary');
Route::post('addFilmToLibrary', "LibraryController@addFilmToMyLibrary")->middleware(['auth'])->name('addFilmToLibrary');
Route::post('deleteFilmFromLibrary', "LibraryController@deleteFilmFromLibrary")->middleware(['auth'])->name('deleteFilmFromLibrary');

Route::post('loadMoreMyFilms', "CabinetController@loadMoreMyFilms")->middleware(['auth'])->name('loadMoreMyFilms');
Route::post('shareFilmToFriend', "UserController@shareFilmToFriend")->middleware(['auth'])->name('shareFilmToFriend');

Route::get('friends', "CabinetController@showMyFriends")->middleware(['auth'])->name('friends');
Route::post('searchFriends', "CabinetController@searchFriends")->middleware(['auth'])->name('searchFriends');
Route::post('deleteFriend', "UserController@deletePersonFromFriendList")->middleware(['auth'])->name('deleteFriend');
Route::post('addFriend', "UserController@addPersonToFriendList")->middleware(['auth'])->name('addFriend');

Route::get('chats', 'CabinetController@showChats')->middleware(['auth'])->name('chats');
Route::get('chat/{id}', 'CabinetController@showChats')->middleware(['auth'])->name('chat');
Route::post('loadMoreMessages', 'CabinetController@loadMoreMessages')->middleware(['auth'])->name('loadMoreMessages');

Route::get('admin', 'AdminController@index')->middleware(['auth'])->name('admin');
Route::get('addFilmToCollection', 'AdminController@addFilmToCollection')->middleware(['auth'])->name('addFilmToCollection');
Route::get('editUser', 'AdminController@editUser')->middleware(['auth'])->name('editUser');
Route::get('addBan', 'AdminController@addBan')->middleware(['auth'])->name('addBan');
Route::get('deleteBan/{id}', 'AdminController@deleteBan')->middleware(['auth'])->name('deleteBan');
Route::get('manage/{id}', 'AdminController@manageLibrary')->middleware(['auth'])->name('manage');
Route::post('loadMoreManageFilms', 'AdminController@loadMoreManageFilms')->middleware(['auth'])->name('loadMoreManageFilms');
Route::post('deleteFilmFromManageLibrary', 'AdminController@deleteFilmFromManageLibrary')->middleware(['auth'])->name('deleteFilmFromManageLibrary');
Route::post('addFilmToManageLibrary', 'AdminController@addFilmToManageLibrary')->middleware(['auth'])->name('addFilmToManageLibrary');

require __DIR__.'/auth.php';
