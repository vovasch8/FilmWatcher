<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    public function addFilmToLibrary($id_film){
        $id_user = auth()->user()->id;
        DB::table('saved_films')->insert(['user_id' => $id_user, 'film_id' => $id_film, 'created_at' => now()]);
    }
    public function deleteFilmFromLibrary($id_film){
        $id_user = auth()->user()->id;
        DB::table('saved_films')->where('user_id', $id_user)->where('film_id',  $id_film)->delete();
    }

}
