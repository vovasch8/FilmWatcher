@extends('layouts.site')

@section('title-block') Адмін панель @endsection

@section("content")
    <div class="container">
        <h3 class="text-center mt-3">Адмін панель</h3>
        <hr>
        @include('include.messages')
        <div class="row">
            <table class="table table-hover mt-3 mb-4">
                <thead>
                <th>Іd</th>
                <th>Нік</th>
                <th>Email</th>
                <th>Дії</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="td-id">{{$user->id}}</td>
                        <td class="td-nick">{{$user->name}}</td>
                        <td class="td-email">{{$user->email}}</td>
                        <td>
                            <button onclick="editUser(this)" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal">Edit
                            </button>
                            @if(\App\Models\Ban::isBan($user->id))
                                <a href="{{route('deleteBan', $user->id)}}"><button onclick="deleteBanForUser(this)" class="btn btn-danger">Delete Ban</button></a>
                            @else
                                <button onclick="banUser(this)" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#banModal">Ban
                                </button>
                            @endif
                            <a href="{{route('manage', $user->id)}}"><button class="btn btn-primary">Manage</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <form action="{{route('editUser')}}" method="get">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Редагування</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input name="id" id="input-id" type="hidden">
                    <div class="input-group">
                        <label class="input-group-text" for="input-nick">Редагувати нік:</label>
                        <input name="name" id="input-nick" type="text" class="form-control" placeholder="Nick">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal Ban-->
<div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
    <form action="{{route('addBan')}}" method="get">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">Бан користувача</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input id="input-baned-user" name="id_user" type="hidden">
                    <div class="input-group">
                        <label class="input-group-text" for="input-nick">Причина бану:</label>
                        <textarea name="message" id="input-message" type="text" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function editUser(el) {
        let id = el.parentNode.parentNode.querySelector('.td-id').textContent;
        let nick = el.parentNode.parentNode.querySelector('.td-nick').textContent;
        let input_nick = document.getElementById('input-nick');
        let input_id = document.getElementById('input-id');
        input_nick.value = nick;
        input_id.value = id;
    }

    function banUser(el) {
        let id = el.parentNode.parentNode.querySelector('.td-id').textContent;
        let input_baned_user = document.getElementById('input-baned-user');
        input_baned_user.value = id;
    }
</script>
