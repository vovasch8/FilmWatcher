<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Film;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CabinetController extends Controller
{

    public function showProfile(){
        return view('site/profile', ['user' => auth()->user()]);
    }
    public function editProfile(Request $req){
        $user = auth()->user();
        $user->image = $req->avatar;

        $user->save();
        return redirect()->route('profile', ['user' => auth()->user()]);
    }
    public function showMyLibrary(){
        $ban = $this->checkBan();
        if($ban) return view('site/ban', ['message' => $ban->message]);

        $user = new User();
        $films = $user->getMyFilms();
        $friends = $user->getListOfFriends();
        return view('site/my-library', ["films" => $films, 'friends' => $friends]);
    }
    public function showMyFriends(){
        $ban = $this->checkBan();
        if($ban) return view('site/ban', ['message' => $ban->message]);

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
    public function showChats($id_friend = 0){
        $ban = $this->checkBan();
        if($ban) return view('site/ban', ['message' => $ban->message]);

        $user = new User;
        $message = new Message();
        $friends = $user->getListPeopleWithChat();
        if(!$id_friend){
            if(isset($friends[0])) $messages = $message->getListOfMessage($friends[0]->id);
            else $messages = [];
        }else{
            $messages = $message->getListOfMessage($id_friend);
        }

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

    public function checkBan(){
        if(!Gate::allows('ban', auth()->user())){
            $ban = new Ban();
            $ban = $ban->all()->where('user_id', '=', auth()->user()->id)->first();
            return $ban;
        }else return false;
    }
}
