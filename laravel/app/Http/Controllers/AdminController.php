<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Film;
use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $user = new User();
        $users = $user->all();
        return view('admin/admin', ['users' => $users]);
    }

    public function manageLibrary($id_user){
        $user = User::find($id_user);
        $film = new Film();
        $films = $film->getFilmsOfUser($id_user);
        return view('admin/manage-library',['user' => $user, 'films' => $films]);
    }

    public function editUser(Request $req){
        $user = User::find($req->input('id'));
        $user->name = $req->input('name');

        $user->save();

        return redirect()->route('admin')->with('success', 'Дані користувача змінено!');
    }

    public function addBan(Request $req){
        $ban = new Ban();
        $ban->addBan($req->id_user, $req->message);

        return redirect()->route('admin')->with('success', 'Користувача заблоковано!');
    }

    public function deleteBan($id_user){
        $ban = new Ban();
        $ban->deleteBan($id_user);
        $user = User::find($id_user);
        $user->role = 'user';
        $user->save();

        return redirect()->route('admin')->with('success', 'Користувача розблоковано!');
    }

    public function loadMoreManageFilms(Request $req){
        $film = new Film();
        $films = $film->getFilmsOfUser($req->id_user, $req->category, $req->counter);
        return view('ajax/manage-films', ['films' => $films]);
    }

    public function deleteFilmFromManageLibrary(Request $req){
        $library = new Library();
        $library->deleteFilmFromLibrary($req->id_user, $req->id_film);
    }

    public function addFilmToManageLibrary(Request $req){
        $library = new Library();
        $library->addFilmToLibrary($req->id_user, $req->id_film);
    }
}
