<header id="header" class="p-3 text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="#" class="float-start fw-bold link-light text-decoration-none"> <img width="30px" height="30px" src="/favicon.ico" alt="logo"> FilmWatcher</a>

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
                        <li><a class="dropdown-item" href="{{route("profile")}}"><i class="bi bi-person-circle"></i> Мій профіль</a></li>
                        <li><a class="dropdown-item" href="{{route("myLibrary")}}"><i class="bi bi-collection-fill"></i> Моя бібліотека</a></li>
                        <li><a class="dropdown-item" href="{{route("friends")}}"><i class="bi bi-people-fill"></i> Друзі</a></li>
                        <li><a class="dropdown-item" href="{{route("chats")}}"><i class="bi bi-chat-fill"></i> Чати</a></li>
                        @if(auth()->user()->isAdmin(auth()->user()->id))
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route("admin")}}"><i class="bi bi-incognito"></i> Адмін панель</a></li>
                            <li><a class="dropdown-item" href="{{route("api_index")}}"><i class="bi bi-window-fullscreen"></i> Аpi сайту</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}"><i class="bi bi-box-arrow-right"></i> Вийти</a></li>
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
