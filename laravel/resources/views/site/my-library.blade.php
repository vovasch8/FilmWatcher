@extends("layouts.site")

@section("title-block") Моя бібліотека @endsection

@section("content")
    <div class="container mt-5  min-vh-100">
        <div class="row">
            <div class="tabs col-lg-4">
                <ul id="category" data-active="film" class="nav nav-tabs" style="width: 202px">
                    <li  class="nav-item type-films">
                        <a id="film" class="nav-link active link-dark" aria-current="page" href="#" onclick="categorySwitcher(this)">Фільми</a>
                    </li>
                    <li class="nav-item type-films">
                        <a id="serial" class="nav-link link-dark" href="#" onclick="categorySwitcher(this)">Серіали</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h4 class="text-center">Моя Бібліотека</h4>
                <hr>
            </div>
        </div>
        <div id="main-content" class="row">
            @foreach($films as $film)
                <div class="col-lg-4 mt-4 film-col">
                    <div class="card" >
                        <img src="{{$film->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$film->name}}</h5>
                            <p style="min-height: 95px;" class="card-text">{{substr($film->description, 0, 150)}}</p>
                            <div class="btn-panel d-flex">
                                <a href="{{route('film', $film->id)}}" class="btn btn-outline-dark">Переглянути</a>
                                <div data-id_film="{{$film->id}}" class="btn-group ms-auto">
                                    <i onclick="deleteFilm(this)" class="bi bi-x-circle btn btn-outline-dark" style="font-size: 18px;"></i>
                                    <i class="bi bi-send btn btn-outline-dark" style="font-size: 18px;" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" style="height: auto; max-height: 150px; overflow-x: hidden;">
                                        @if(!$friends)
                                            <li><a class="dropdown-item" >У вас ще немає друзів</a></li>
                                        @else
                                            @foreach($friends as $friend)
                                                <li><a onclick="shareFilm(this)" data-id_friend="{{$friend->id}}" class="dropdown-item" href="#"><img width="30px" height="30px" class="rounded-circle" src="{{$friend->image}}" alt="avatar"> {{$friend->name}}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row">
            <button onclick="loadContent(this)" id="load-more" style="width: 200px"
                    class="btn btn-dark mx-auto mt-3 mb-3">Загрузити ще...
            </button>
        </div>
    </div>
@endsection

<script>
        //switch type of films
        function categorySwitcher(el){
            $('#film').removeClass('active');
            $('#serial').removeClass('active');
            $(el).addClass('active');
            $(el).closest('#category').attr('data-active', $(el).attr('id'));
            loadContent(el);
        }

        //load more content ajax
        var counter = 0;
        function loadContent(el){

            if(el.closest('#category'))counter = 0;
            else counter++;

            let block = document.getElementById('main-content');

            let category = $('#category').attr('data-active');

            $.ajax({
                type:'POST',
                url:"{{ route('loadMoreMyFilms') }}",
                data: {"_token": $('meta[name="csrf-token"]').attr('content'), "counter" : counter, "category" : category},
                success: function (response) {
                    if(counter === 0)block.innerHTML = response;
                    else block.innerHTML = block.innerHTML + response;
                }
            });
        }

    function deleteFilm (el){
        let id_film = $(el).parent().attr('data-id_film');
        console.log(id_film);
        $.ajax({
            type:'POST',
            url:"{{ route('deleteFilmFromLibrary') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_film" : id_film},
            success: function (response) {
                 $(el).closest('.film-col').remove();
            }
        });
    }

        //share film to friend
        function shareFilm (el){
            let id_film = $(el).closest('.btn-group').attr('data-id_film');
            let id_friend = $(el).attr('data-id_friend');
            console.log((id_film + id_friend));
            $.ajax({
                type:'POST',
                url:"{{ route('shareFilmToFriend') }}",
                data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_film" : id_film, "id_friend" : id_friend},
                success: function (response) {
                    console.log(response);
                }
            });
        }
</script>
