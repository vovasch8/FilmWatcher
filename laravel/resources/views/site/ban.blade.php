@extends('layouts.site')

@section('title-block') Заблоковано @endsection

@section('content')
    <div class="container text-center min-vh-100">
        <h3 class="mt-5 mb-3">Вас заблоковано!</h3>
        <p class="alert alert-warning mt-5 mb-3">{{$message}}</p>
        <img class="mt-5" width="300px" height="300px" src="https://blocksite.co/wp-content/uploads/2017/11/favicon-2.png" alt="message">
    </div>
@endsection
