<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilmResource;
use App\Http\Resources\UserResource;
use App\Models\Film;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        return view('api/api_v1');
    }

    public function getCountUsers(){
        $user = new User();
        $count_users = $user->getCountUsers();

        return json_encode(['data' => ['count_users' => $count_users]]);
    }

    public function getCountFilms(){
        $film = new Film();
        $count_films = $film->getCountFilms();
        return json_encode(['data' => ['count_films' => $count_films]]);
    }

    public function getUser($id_user){

        return new UserResource(User::findOrFail($id_user));
    }

    public function getFilms($skip){
        $film = new Film();
        return FilmResource::collection($film->all()->sortByDesc('created_at')->skip($skip)->take(10));
    }
}
