<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CabinetController extends Controller
{
    public function showMyLibrary(){
        $user = new User();
        $films = $user->getMyFilms();
        $friends = $user->getListOfFriends();
        return view('site/my-library', ["films" => $films, 'friends' => $friends]);
    }
    public function showMyFriends(){
        $user = new User;
        $friends = $user->getListOfFriends();
        return view('site/friends', ["friends" => $friends]);
    }
    public function searchFriends(Request $req){
        $id_user = auth()->user()->id;
        echo view('ajax/friends')
            ->with(['friends' => ((DB::table('users')
            ->where('name', 'LIKE',"%$req->search%")
                ->where('id', '!=', $id_user)->get()))]);
    }
    public function showChats(){
        $user = new User;
        $message = new Message();
        $friends = $user->getListOfFriends();
        $messages = $message->getListOfMessage($friends[0]->id);
        return view('site/chat',['friends' => $friends, 'messages' => $messages]);
    }

    public function loadMoreMessage(){

    }
    public function loadMoreMyFilms(Request $req){
        $user = new User();
        $friends = $user->getListOfFriends();
        $film = new Film();
        $films = $user->getMyFilms($req->category, $req->counter);
        return view('ajax/films', ['films' => $films, 'friends' => $friends]);
    }
}
