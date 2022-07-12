@extends('layouts.site')

@section("title-block") Друзі @endsection

@section("content")
    <div class="container">
        <h3 class="text-center mt-3">Друзі</h3>
        <div class="row">
            <div class="search mt-3 d-flex justify-content-center">
                <input type="text" class="form-control d-inline" placeholder="Знайти друзів" style="max-width: 760px;">
                <button class="btn btn-dark ms-1">Пошук</button>
            </div>
        </div>
        <hr>
        <div class="row mt-4">
            <div class="col-lg-4 offset-lg-2">
                <div class="friend hstack">
                    <img width="70px" height="70px" src="https://s2.afisha.ru/mediastorage/f8/40/44c361537e354921a5a5266240f8.jpg" alt="friend" class="rounded-circle">
                    <p class="fw-bold ms-3">NickName</p>
                    <button class="btn btn-success ms-auto"><i class="bi bi-people"></i> Друзі</button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="friend hstack">
                    <img width="70px" height="70px" src="https://s2.afisha.ru/mediastorage/f8/40/44c361537e354921a5a5266240f8.jpg" alt="friend" class="rounded-circle">
                    <p class="fw-bold ms-3">NickName</p>
                    <button class="btn btn-success ms-auto"><i class="bi bi-people"></i> Друзі</button>
                </div>
            </div>
            <div class="col-lg-2"></div>

            <div class="col-lg-4 offset-lg-2 mt-3">
                <div class="friend hstack">
                    <img width="70px" height="70px" src="https://s2.afisha.ru/mediastorage/f8/40/44c361537e354921a5a5266240f8.jpg" alt="friend" class="rounded-circle">
                    <p class="fw-bold ms-3">NickName</p>
                    <button class="btn btn-success ms-auto"><i class="bi bi-people"></i> Друзі</button>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="friend hstack">
                    <img width="70px" height="70px" src="https://s2.afisha.ru/mediastorage/f8/40/44c361537e354921a5a5266240f8.jpg" alt="friend" class="rounded-circle">
                    <p class="fw-bold ms-3">NickName</p>
                    <button class="btn btn-success ms-auto"><i class="bi bi-people"></i> Друзі</button>
                </div>
            </div>
            <div class="col-lg-2 mt-3"></div>
        </div>
    </div>
@endsection
