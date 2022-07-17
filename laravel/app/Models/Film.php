<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'actors',
        'image',
        'year',
        'genre',
        'trailer'
    ];

    public static function isInMyLibrary($id_film){
        $id_user = auth()->user()->id;
        if(count(DB::table('saved_films')->where('user_id', $id_user)->where('film_id', $id_film)->get())){return true;}
        else return false;
    }

    public function getListOfFilms($type = 'film', $skip = 0, $count = 18){
        $film = new Film();
        return $film->all()->where('type', '=', $type)->skip($count * $skip)->sortByDesc('id')->take($count);
    }
}
