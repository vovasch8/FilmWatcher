<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function getListOfMessage($id_friend, $skip = 0, $count = 10){
        $id_user = auth()->user()->id;
        $messages = DB::table('message')
            ->join('films', 'message.film_id', '=', 'films.id')
            ->where('user_id', $id_user)
            ->where('friend_id', $id_friend)
            ->orWhere('user_id', $id_friend)
            ->where('friend_id', $id_user)
            ->skip($skip)->take($count)->get();
//        $messages = DB::statement('SELECT * FROM message INNER JOIN films ON message.film_id = films.id WHERE (user_id = '.$id_user
//        . ' AND friend_id = '.$id_friend.') OR (user_id = '.$id_friend.' AND friend_id = '.$id_user);
        return $messages;
    }
}
