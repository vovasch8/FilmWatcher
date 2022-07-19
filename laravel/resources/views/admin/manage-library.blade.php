@extends("layouts.site")

@section('title-block') Управління бібліотекою @endsection

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
                <h4 class="text-center">Бібліотека: {{$user->name}} <span style="display: none" id="id_user">{{$user->id}}</span></h4>
                <hr>
            </div>
            <div class="col-lg-4">
                <div class="input-group float-end ">
                    <input id="added-film" type="text" class="form-control" placeholder="ID - фільму чи серіалу">
                    <button onclick="addFilm(this)" type="button" class="btn btn-dark">
                        Додати фільм
                    </button>
                </div>
            </div>
        </div>
        <div id="main-content" class="row">
            @foreach($films as $film)
                <div class="col-lg-4 mt-4 film-col">
                    <div class="card">
                        <img src="{{$film->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$film->name}}</h5>
                            <p style="min-height: 95px;" class="card-text">{{substr($film->description, 0, 150)}}</p>
                            <div class="btn-panel d-flex">
                                <a href="{{route('film', $film->id)}}" class="btn btn-outline-dark">Переглянути</a>
                                <div data-id_film="{{$film->id}}" class="btn-group ms-auto">
                                    <i onclick="deleteFilm(this)" class="bi bi-x-circle btn btn-outline-dark"
                                       style="font-size: 18px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row">
            <button onclick="loadManageContent(this)" id="load-more" style="width: 200px"
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
        loadManageContent(el);
    }


    //load more content ajax
    var counter = 0;

    function loadManageContent(el) {

        if (el.closest('#category')) counter = 0;
        else counter++;

        let block = document.getElementById('main-content');
        let id_user = document.getElementById('id_user').textContent;

        let category = $('#category').attr('data-active');

        $.ajax({
            type: 'POST',
            url: "{{ route('loadMoreManageFilms') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_user": id_user, "counter": counter, "category": category},
            success: function (response) {
                if (counter == 0) block.innerHTML = response;
                else block.innerHTML = block.innerHTML + response;
            }
        });
    }

    function deleteFilm (el){
        let id_film = $(el).parent().attr('data-id_film');
        let id_user = $('#id_user').text();
        $.ajax({
            type:'POST',
            url:"{{ route('deleteFilmFromManageLibrary') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_film" : id_film, 'id_user': id_user},
            success: function (response) {
                $(el).closest('.film-col').remove();
            }
        });
    }

    function addFilm(el){
        let id_film = document.getElementById('added-film').value;
        let id_user = $('#id_user').text();
        $.ajax({
            type:'POST',
            url:"{{ route('addFilmToManageLibrary') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_film" : id_film, 'id_user': id_user},
            success: function (response) {
                alert('Фільм додано успішно!');
                document.location.reload();
            }
        });

    }

</script>
