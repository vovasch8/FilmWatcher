@extends("layouts.site")

@section("title-block") Чати @endsection

@section("content")
    <div class="container min-vh-100">
        <div class="row gx-5 ">
            <div class="col-lg-4 ">
                <div class="bg-light mt-4 mb-4 border" style="height: auto; height: 90vh; overflow-x: hidden;">
                    <h3 class="text-center mt-3">Чати</h3>
                    <hr>
                    <div class="row mt-3">
                        @foreach($friends as $friend)
                            <a href="{{route('chat', $friend->id)}}" class="friend hstack mt-3 ms-5 link-dark text-decoration-none">
                                <img width="70px" height="70px" src="{{$friend->image}}" alt="friend" class="rounded-circle">
                                <p class="fw-bold ms-3">{{$friend->name}}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="bg-light px-3 mt-4 mb-4 border" style="height: auto; height: 90vh; overflow-x: hidden;">
                    @if(!count($messages)) <div class="text-center mx-auto mt-4"><img class="text-center mx-auto mt-5" style="width: 300px; height: 300px;"
                                               src="https://cdn-icons-png.flaticon.com/512/4565/4565014.png"
                                            </div>
                    @endif
                    @foreach($messages as $message)
                        @if(auth()->user()->id != $message->user_id)
                             <div class="chat-entity row">
                                <div class="friend hstack mt-3">
                                    <img width="70px" height="70px" src="{{$friends[0]->image}}" alt="friend" class="rounded-circle">
                                    <p class="fw-bold ms-3">{{$friends[0]->name}}</p>
                                </div>
                                <div class="message">
                                    <div style="max-width: 250px;" class="card">
                                        <img src="{{$message->image}}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$message->name}}</h5>
                                            <p class="card-text">{{substr($message->description, 0, 100)}}</p>
                                            <div class="btn-panel d-flex">
                                                <a href="{{route('film', $message->film_id)}}" class="btn btn-outline-dark">Переглянути</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="chat-entity row">
                                    <div class="message mt-3">
                                        <div style="max-width: 250px;" class="card float-end">
                                            <img src="{{$message->image}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$message->name}}</h5>
                                                <p class="card-text">{{substr($message->description, 0, 100)}}</p>
                                                <div class="btn-panel d-flex">
                                                    <a href="{{route('film', $message->film_id)}}" class="btn btn-outline-dark">Переглянути</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endif
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
