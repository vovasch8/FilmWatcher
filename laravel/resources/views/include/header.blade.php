<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="#" class="float-start fw-bold link-light text-decoration-none">FilmWatcher</a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 mx-auto">
          <li><a href="{{route('films')}}" class="nav-link px-2 text-white">Бібліотека фільмів</a></li>
            @auth
                <li><a href="{{route("myLibrary")}}" class="nav-link px-2 text-white">Моя бібліотека</a></li>
            @endauth
        </ul>
            @auth
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{auth()->user()->image}}" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="{{route("myLibrary")}}">Моя бібліотека</a></li>
                        <li><a class="dropdown-item" href="{{route("friends")}}">Друзі</a></li>
                        <li><a class="dropdown-item" href="{{route("chat")}}">Чати</a></li>
                        @if(auth()->user()->isAdmin(auth()->user()->id))
                            <li><a class="dropdown-item" href="{{route("admin")}}">Адмін панель</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Вийти</a></li>
                    </ul>
                </div>
            @else
              <div class="text-end">
                    <a href="{{route('login')}}"><button type="button" class="btn btn-outline-light me-2">Вхід</button></a>
                    <a href="{{route('register')}}"><button type="button" class="btn btn-outline-light">Реєстрація</button></a>
              </div>
            @endauth
      </div>
    </div>
  </header>
