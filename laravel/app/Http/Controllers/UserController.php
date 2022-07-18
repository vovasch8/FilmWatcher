<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function shareFilmToFriend(Request $req){
        $user = new User();
        $user->shareFilmToFriend($req->id_film, $req->id_friend);
    }

    public function addPersonToFriendList(Request $req){
        $user = new User();
        $user->addPersonToFriend($req->id_friend);
    }

    public function deletePersonFromFriendList(Request $req){
        $user = new User();
        $user->deletePersonFromFriends($req->id_friend);
    }
}
