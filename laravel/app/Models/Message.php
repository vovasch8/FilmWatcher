<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function getListOfMessage($id_friend, $skip = 0, $count = 5){
        $id_user = auth()->user()->id;
        $messages = DB::table('message')
            ->join('films', 'message.film_id', '=', 'films.id')
            ->where('user_id', $id_user)
            ->where('friend_id', $id_friend)
            ->orWhere('user_id', $id_friend)
            ->where('friend_id', $id_user)
            ->orderBy('message.created_at','desc')
            ->skip($skip * $count)->take($count)->get();

        $messages = $messages->toArray();

        usort($messages, function($m1,$m2) {
            if ($m1->created_at == $m2->created_at) return 0;
            return ($m1->created_at > $m2->created_at) ? -1 : 1;
        });

        return $messages;
    }
}
