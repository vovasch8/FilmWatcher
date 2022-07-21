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
                        @if(!count($friends)) <img class="text-center mx-auto"
                                                   style="width: 200px; height: 200px; margin-top: 100px;"
                                                   src="https://cdn2.iconfinder.com/data/icons/people-talking-chatting-conversation-communication/322/talking-chat-8-512.png"
                                                   alt="Empty">
                        @else
                            @if($current_user)
                                <input id="current_user" type="hidden" value="{{$current_user}}">
                            @else
                                <input id="current_user" type="hidden" value="{{$friends[0]->id}}">
                            @endif
                        @endif
                        @foreach($friends as $friend)
                            <a href="{{route('chat', $friend->id)}}"
                               class="friend hstack mt-3 ms-5 link-dark text-decoration-none">
                                <img width="70px" height="70px" src="{{$friend->image}}" alt="friend"
                                     class="rounded-circle">
                                <p class="fw-bold ms-3">{{$friend->name}}
                                    @if(!$friend->isReaded)
                                        <span><i class="bi bi-envelope-plus text-success"></i></span>
                                    @endif
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="bg-light px-3 mt-4 mb-4 border" style="height: auto; height: 90vh; overflow-x: hidden;">
                    @if(!count($messages))
                        <div class="text-center mx-auto mt-4"><img class="text-center mx-auto mt-5"
                                                                   style="width: 300px; height: 300px;"
                                                                   src="https://cdn-icons-png.flaticon.com/512/4565/4565014.png"
                        </div>
                    @else
                        <div class="row">
                            <button onclick="loadMoreMessages(this)" id="load-more" style="width: 200px"
                                    class="btn btn-secondary mx-auto mt-3 mb-3">
                                <i class="bi bi-arrow-up-circle"></i>
                            </button>
                        </div>
                    @endif
                    <div id="main-content">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

<script>
    //load more content ajax
    var counter = 0;

    function loadMoreMessages(el) {

        let block = document.getElementById('main-content');
        let id_user = document.getElementById('current_user').value;

        counter++;

        $.ajax({
            type: 'POST',
            url: "{{ route('loadMoreMessages') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "counter": counter, id_user: id_user},
            success: function (response) {
                console.log(response);
                block.innerHTML = response + block.innerHTML;
            }
        });
    }
</script>
