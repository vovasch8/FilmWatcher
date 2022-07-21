@foreach($messages as $message)
    @if(auth()->user()->id != $message->user_id)
        <div class="chat-entity row">
            <div class="friend hstack mt-3">
                <img width="70px" height="70px" src="{{$friends[0]->image}}" alt="friend"
                     class="rounded-circle">
                <p class="fw-bold ms-3">{{$friends[0]->name}}</p>
            </div>
            <div class="message">
                <div style="max-width: 250px;" class="card">
                    <img src="{{$message->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$message->name}}</h5>
                        <p class="card-text">{{substr($message->description, 0, 100)}}</p>
                        <div class="btn-panel d-flex">
                            <a href="{{route('film', $message->film_id)}}"
                               class="btn btn-outline-dark">Переглянути</a>
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
                            <a href="{{route('film', $message->film_id)}}"
                               class="btn btn-outline-dark">Переглянути</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endif
@endforeach
