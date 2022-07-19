<?php

namespace App\Models;

use DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function shareFilmToFriend($id_film, $id_friend){
        $id_user = auth()->user()->id;
        DB::table('message')->insert(['user_id' => $id_user, 'friend_id' => $id_friend, 'film_id' => $id_film]);
    }

    public function addPersonToFriend($id_person){
        $id_user = auth()->user()->id;
        DB::table('relationship')->insert(['user_id' => $id_user, 'friend_id' => $id_person]);
    }

    public function deletePersonFromFriends($id_friend){
        $id_user = auth()->user()->id;
        DB::table('relationship')->where('user_id', $id_user)->where('friend_id',  $id_friend)->delete();
    }

    public function isFriend($id_friend){
        $id_user = auth()->user()->id;
        if(count(DB::table('relationship')
            ->where('user_id', $id_user)
            ->where('friend_id', $id_friend)->get())) return true;
        else return false;
    }

    public function isAdmin($id_user){
        $user = User::find($id_user);
        if($user->role == 'admin')return true;
        else return false;
    }

    public function getListOfFriends(){
        $id_user = auth()->user()->id;
        $user_relations = DB::table("relationship")->where('user_id', $id_user)->get();
        $friends = [];
        foreach ($user_relations as $relation){
            $friends[] = User::find($relation->friend_id);
        }
        return $friends;
    }

    public function getListPeopleWithChat(){
        $id_user = auth()->user()->id;
        $user_relations = DB::table("relationship")
            ->where('user_id', $id_user)
            ->orWhere('friend_id', $id_user)->get();
        $friends = [];
        foreach ($user_relations as $relation){
            $friends[] = User::find($relation->friend_id);
        }
        return $friends;
    }

    public function getMyFilms($type = "film", $skip = 0, $count = 18){
        $id_user = auth()->user()->id;
        return DB::table('films')->join('saved_films', 'films.id', '=', 'saved_films.film_id')
            ->where('user_id', $id_user)
            ->where('type', '=', $type)
            ->orderBy('saved_films.created_at', 'desc')
            ->skip($count * $skip)
            ->take($count)->get();
    }

}
