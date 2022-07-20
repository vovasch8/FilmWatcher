@extends('layouts.site')

@section('title-block') Профіль @endsection

@section('content')
    <div class="container min-vh-100">
        <div class="row d-flex">
            <div class="profile mx-auto text-center mt-4 border bg-light" style="width: 500px;">
                <h3 class="text-center text-secondary">Профіль користувача</h3>
                <hr>
                <img style="height: 300px; width: 300px;" src="{{$user->image}}" alt="avatar" class="rounded-circle">
                <p class="fw-bold">{{$user->name}}</p>
                <p><span class="fw-bold">Email:</span> {{$user->email}}</p>
                <button data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-dark mb-3">Редагувати</button>
            </div>
            <div class="menu">

            </div>
        </div>
    </div>
@endsection


<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <form action="{{route('editProfile')}}" method="get">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Виберіть аватар</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="avatars">
                        <div class="row">
                            <input id="avatar" name="avatar" type="hidden">
                            @for($i = 1; $i < 25; $i++)
                                <div class="col-lg-3">
                                    <img class="avatar" data-id_avatar="{{$i}}" onclick="choiceAvatar(this)" style="width: 80px; height: 80px;" src='/avatars/{{$i}}.jpg' alt="avatar">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function choiceAvatar(el){
        document.querySelectorAll('.avatar').forEach( (e) => { $(e).removeClass('border');});
        $(el).addClass('border');
        let src = $(el).attr('src');
        $('#avatar').val(src);
    }
</script>
