@foreach($friends as $friend)
    <div class="col-lg-6 mt-4">
        <div class="friend hstack mx-auto px-5  bg-light border">
            <img width="70px" height="70px" src="{{$friend->image}}" alt="friend" class="rounded-circle">
            <p class="fw-bold ms-3">{{$friend->name}}</p>
            <button class="btn btn-success ms-auto">
                @if(auth()->user()->isFriend($friend->id))
                    <i class="bi bi-check"></i>
                @else <i class="bi bi-people-fill"></i>
                @endif Друзі</button>
        </div>
    </div>
@endforeach
