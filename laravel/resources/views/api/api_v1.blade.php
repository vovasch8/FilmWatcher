@extends('layouts.site')

@section('title-block') Api V1 @endsection

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <h4 class="text-center mt-4 mb-4">FilmWatcher - Api v1</h4>
            <div class="row">
                <h5>Доступні команди:</h5>
                <div class="mt-4 mb-3"><span class="alert alert-success">GET</span> <a href="{{route('getCountUsers')}}">count users</a> - Дозволяє дізнатись поточну кількість користувачів на сайті.</div>
                <div class="mt-4 mb-3"><span class="alert alert-success">GET</span> <a href="{{route('getCountFilms')}}">count films</a> - Дозволяє дізнатись поточну кількість фільмів та серіалів на сайті.</div>
                <div class="mt-4 mb-3"><span class="alert alert-success">GET</span> <a href="{{route('getFilms', 0)}}">get films / {skip}</a> - Дозволяє отримати останні десять фільмів, параметер skip вказує на скільки фільмів зміщенна вибірка.</div>
                <div class="mt-4 mb-3"><span class="alert alert-success">GET</span> <a href="{{route('getUser', 1)}}">get user / {id}</a> - Дозволяє отримати дані користувача з вказаним id.</div>
            </div>
        </div>
    </div>
@endsection
