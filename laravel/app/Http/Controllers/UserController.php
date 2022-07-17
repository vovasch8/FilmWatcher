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

    public function addPersonToFriendList($id_person){
        $user = new User();
        $user->addPersonToFriend($id_person);
    }
}
