@foreach($films as $film)
    <div class="col-lg-4 mt-4 film-col">
        <div class="card">
            <img src="{{$film->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$film->name}}</h5>
                <p style="min-height: 95px;" class="card-text">{{substr($film->description, 0, 150)}}</p>
                <div class="btn-panel d-flex">
                    <a href="{{route("film", $film->id)}}" class="btn btn-outline-dark">Переглянути</a>
                    @auth
                        @can('ban', auth()->user())
                            <div data-id_film="{{$film->id}}" class="btn-group ms-auto">
                                @if(Request::is('loadMoreMyFilms'))
                                    <i onclick="deleteFilm(this)" class="bi bi-x-circle btn btn-outline-dark"
                                       style="font-size: 18px;"></i>
                                @else
                                    @if(App\Models\Film::isInMyLibrary($film->id))
                                        <i class="bi bi-check btn btn-outline-dark" style="font-size: 18px;"></i>
                                    @else
                                        <i onclick="addFilm(this)" class="bi bi-plus-circle btn btn-outline-dark"
                                           style="font-size: 18px;"></i>
                                    @endif
                                @endif
                                <i class="bi bi-send btn btn-outline-dark" style="font-size: 18px;"
                                   data-bs-toggle="dropdown" aria-expanded="false"></i>

                                <ul class="dropdown-menu" style="height: auto; max-height: 150px; overflow-x: hidden;">
                                    @if(!$friends)
                                        <li><a class="dropdown-item">У вас ще немає друзів</a></li>
                                    @else
                                        @foreach($friends as $friend)
                                            <li><a onclick="shareFilm(this)" data-id_friend="{{$friend->id}}"
                                                   class="dropdown-item" href="#"><img width="30px" height="30px"
                                                                                       class="rounded-circle"
                                                                                       src="{{$friend->image}}"
                                                                                       alt="avatar"> {{$friend->name}}
                                                </a></li>
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
