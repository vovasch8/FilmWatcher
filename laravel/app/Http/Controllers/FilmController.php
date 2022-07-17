<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{

    public function showFilms(){
        $film = new Film();
        $user = new User();
        $friends = $user->getListOfFriends();
        $films = $film->getListOfFilms();
        return view('site/films', ["films" => $films, 'friends' => $friends]);
    }
    public function showFilm($id){
        $film = Film::find($id);
        return view('site/film', ["film" => $film]);
    }
    public function loadMoreFilms(Request $req){
        $user = new User();
        $friends = $user->getListOfFriends();
        $film = new Film();
        $films = $film->getListOfFilms($req->category, $req->counter);
        return view('ajax/films', ['films' => $films, 'friends' => $friends]);
    }
    public function searchFilms(Request $req){
        $user = new User();
        $friends = $user->getListOfFriends();

        echo view('ajax/films')->with(['films' => (DB::table('films')
            ->where('name', 'LIKE',"%$req->search%")->get())
            ->where('type', $req->category), 'friends' => $friends]);
    }

}
