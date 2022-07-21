@extends("layouts.site")

@section("title-block") Всі фільми @endsection

@section("content")
    <div class="container mt-5  min-vh-100">
        <div class="row">
            <div class="tabs col-lg-4">
                <ul id="category" data-active="film" class="nav nav-tabs" style="width: 202px">
                    <li class="nav-item type-films">
                        <a id="film" class="nav-link active link-dark" aria-current="page" href="#"
                           onclick="categorySwitcher(this)">Фільми</a>
                    </li>
                    <li class="nav-item type-films">
                        <a id="serial" class="nav-link link-dark" href="#" onclick="categorySwitcher(this)">Серіали</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h4 class="text-center">Бібліотека фільмів</h4>
                <hr>
            </div>
            <div class="search col-lg-4">
                <input id="input-search" type="text" class="form-control d-inline" placeholder="Пошук"
                       style="max-width: 250px;">
                <button onclick="searchFilm(this)" class="btn btn-dark ms-1">Пошук</button>
            </div>
        </div>
        <div id="main-content" class="row">
            @foreach($films as $film)
                <div class="col-lg-4 mt-4">
                    <div class="card">
                        <img height="310px" src="{{$film->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$film->name}}</h5>
                            <p style="min-height: 95px;" class="card-text">{{substr($film->description, 0, 150)}}</p>
                            <div class="btn-panel d-flex">
                                <a href="{{route("film", $film->id)}}" class="btn btn-outline-dark">Переглянути</a>
                                @auth
                                    @can('ban', auth()->user())
                                        <div data-id_film="{{$film->id}}" class="btn-group ms-auto">
                                            @if($film->isInMyLibrary($film->id))
                                                <i class="bi bi-check btn btn-outline-dark"
                                                   style="font-size: 18px;"></i>
                                            @else
                                                <i onclick="addFilm(this)"
                                                   class="bi bi-plus-circle btn btn-outline-dark"
                                                   style="font-size: 18px;"></i>
                                            @endif
                                            <i class="bi bi-send btn btn-outline-dark" style="font-size: 18px;"
                                               data-bs-toggle="dropdown" aria-expanded="false"></i>

                                            <ul class="dropdown-menu"
                                                style="height: auto; max-height: 150px; overflow-x: hidden;">
                                                @if(!$friends)
                                                    <li><a class="dropdown-item">У вас ще немає друзів</a></li>
                                                @else
                                                    @foreach($friends as $friend)
                                                        <li><a onclick="shareFilm(this)"
                                                               data-id_friend="{{$friend->id}}" class="dropdown-item">
                                                                <img width="30px" height="30px"
                                                                             class="rounded-circle"
                                                                             src="{{$friend->image}}"
                                                                             alt="avatar"> {{$friend->name}}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    @endcan
                                @endauth
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
    function categorySwitcher(el) {
        $('#film').removeClass('active');
        $('#serial').removeClass('active');
        $(el).addClass('active');
        $(el).closest('#category').attr('data-active', $(el).attr('id'));
        loadContent(el);
    }

    //add films to library
    function addFilm(el) {
        let id_film = $(el).parent().attr('data-id_film');
        $.ajax({
            type: 'POST',
            url: "{{ route('addFilmToLibrary') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_film": id_film},
            success: function (response) {
                $(el).removeClass('bi-plus-circle');
                $(el).addClass('bi-check');
                $(el).attr('onclick', '');
            }
        });
    }

    //share film to friend
    function shareFilm(el) {
        let id_film = $(el).closest('.btn-group').attr('data-id_film');
        let id_friend = $(el).attr('data-id_friend');
        console.log((id_film + id_friend));
        $.ajax({
            type: 'POST',
            url: "{{ route('shareFilmToFriend') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_film": id_film, "id_friend": id_friend},
            success: function (response) {
                console.log(response);
            }
        });
    }

    //load more content ajax
    var counter = 0;

    function loadContent(el) {

        if (el.closest('#category')) counter = 0;
        else counter++;

        let block = document.getElementById('main-content');

        let category = $('#category').attr('data-active');

        $.ajax({
            type: 'POST',
            url: "{{ route('loadMoreFilms') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "counter": counter, "category": category},
            success: function (response) {
                console.log(response);
                if (counter == 0) block.innerHTML = response;
                else block.innerHTML = block.innerHTML + response;
            }
        });
    }

    // search content
    function searchFilm(el) {
        counter = 0;
        let block = document.getElementById('main-content');
        let category = $('#category').attr('data-active');
        let search = $("#input-search").val();

        $.ajax({
            type: 'POST',
            url: "{{ route('searchFilms') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "category": category, "search": search},
            success: function (response) {
                block.innerHTML = response;
            }
        });
    }

</script>
