@extends('layouts.site')

@section("title-block") Друзі @endsection

@section("content")
    <div class="container min-vh-100">
        <div class="row mt-4">
            <div class="col-lg-6 offset-lg-3">
                <h4 class="text-center">Люди на яких ви підписані</h4>
                <div class="search mt-3 d-flex justify-content-center">
                    <input id="input-friends" type="text" class="form-control d-inline" placeholder="Знайти друзів" style="max-width: 760px;">
                    <button onclick="searchFriend(this)" class="btn btn-dark ms-1">Пошук</button>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
                <div id="friends" class="row">
                    @foreach($friends as $friend)
                        <div data-id_friend="{{$friend->id}}" class="col-lg-6 mt-4 friend">
                            <div class="hstack mx-auto px-5  bg-light border">
                                <img width="70px" height="70px" src="{{$friend->image}}" alt="friend" class="rounded-circle">
                                <p class="fw-bold ms-3">{{$friend->name}}</p>
                                <button onclick="deleteFriend(this)" class="btn btn-success ms-auto"><i class="bi bi-check"></i> Друзі</button>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
@endsection

<script>
    // search content
    function searchFriend(el){
        let block = document.getElementById('friends');
        let search = $("#input-friends").val();

        $.ajax({
            type:'POST',
            url:"{{ route('searchFriends') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "search" : search},
            success: function (response) {
                block.innerHTML = response;
            }
        });
    }

    //delete friend
    function deleteFriend(el){
        let id_friend = $(el).closest('.friend').attr('data-id_friend');

        $.ajax({
            type:'POST',
            url:"{{ route('deleteFriend') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_friend" : id_friend},
            success: function (response) {
                $(el).children().removeClass('bi-check');
                $(el).children().addClass('bi-people-fill');
                $(el).attr('onclick', 'addFriend(this)');
            }
        });
    }

    //add friend
    function addFriend(el){
        let id_friend = $(el).closest('.friend').attr('data-id_friend');

        $.ajax({
            type:'POST',
            url:"{{ route('addFriend') }}",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_friend" : id_friend},
            success: function (response) {
                $(el).children().removeClass('bi-people-fill');
                $(el).children().addClass('bi-check');
                $(el).attr('onclick', 'deleteFriend(this)');
            }
        });
    }
</script>
