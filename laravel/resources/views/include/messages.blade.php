@if($errors->any())
    <div class="alert alert-danger text-center">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success text-center">
        {{session('success')}}
    </div>
@endif
