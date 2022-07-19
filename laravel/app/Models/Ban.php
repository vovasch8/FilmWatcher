<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    use HasFactory;

    public function addBan($id_user, $message){
        $user = User::find($id_user);
        $user->role = 'ban';
        $user->save();

        DB::table('bans')->insert(['user_id' => $id_user, 'message' => $message]);
    }

    public function deleteBan($id_user){
        DB::table('bans')->where('user_id', '=', $id_user)->delete();
    }

    public static function isBan($id_user){
        if(count(DB::table('bans')->where('user_id', '=', $id_user)->get())) return true;
        return false;
    }
}
