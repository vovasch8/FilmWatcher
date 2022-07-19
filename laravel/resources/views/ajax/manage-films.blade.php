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
