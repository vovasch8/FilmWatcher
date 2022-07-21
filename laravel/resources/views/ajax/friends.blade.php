@foreach($friends as $friend)
    <div class="col-lg-6 mt-4 friend" data-id_friend="{{$friend->id}}">
        <div class="hstack mx-auto px-5 py-1 bg-light border">
            <img width="70px" height="70px" src="{{$friend->image}}" alt="friend" class="rounded-circle">
            <p class="fw-bold ms-3">{{$friend->name}}</p>
                @if(auth()->user()->isFriend($friend->id))
                <button onclick="deleteFriend(this)" class="btn btn-success ms-auto">
                    <i class="bi bi-check"></i> Друзі
                </button>
                @else
                <button onclick="addFriend(this)" class="btn btn-success ms-auto">
                    <i class="bi bi-people-fill"></i> Друзі
                </button>
                @endif
        </div>
    </div>
@endforeach
