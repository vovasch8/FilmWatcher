<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class LibraryController extends Controller
{
    public function addFilmToMyLibrary(Request $req){
        $id_film = $req->id_film;
        $library = new Library();
        $library->addFilmToLibrary($id_film);
    }
    public function deleteFilmFromLibrary(Request $req){
        $id_film = $req->id_film;
        $library = new Library();
        $library->deleteFilmFromLibrary($id_film);
    }

}
