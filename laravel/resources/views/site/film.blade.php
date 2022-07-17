@extends("layouts.site")

@section("title-block") {{$film->name}} @endsection

@section("content")
    <div class="container  min-vh-100">
        <div class="row mt-4">
            <div class="col-lg-6">
                <img class="d-inline" style="max-width: 650px; max-height: 500px" src="{{$film->image}}" alt="{{$film->name}}">
                <h4 class="text-center">{{$film->name}}</h4>
                <hr>
                <h5>Опис фільму</h5>
                <p class="float-left">{{$film->description}}</p>
                <p><span class="fw-bold">Жанр:</span> {{$film->genre}} <span class="fw-bold"> Рік випуску:</span> {{$film->year}}</p>
            </div>
            <div class="col-lg-6">
                <h4 class="text-center">Трейлер</h4>
                <div id="trailer">
                    <iframe src="{{$film->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
