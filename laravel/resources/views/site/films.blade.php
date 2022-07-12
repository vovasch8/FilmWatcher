@extends("layouts.site")

@section("title-block") Всі фільми @endsection

@section("content")
    <div class="container mt-5">
        <div class="row">
            <div class="tabs col-lg-4">
                <ul class="nav nav-tabs" style="width: 202px">
                    <li class="nav-item">
                        <a class="nav-link active link-dark" aria-current="page" href="#">Фільми</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="#">Серіали</a>
                    </li>
                </ul>
            </div>
            <div class="search col-lg-4">
                <input type="text" class="form-control d-inline" placeholder="Пошук" style="max-width: 250px;">
                <button class="btn btn-dark ms-1">Пошук</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://aussiedlerbote.de/wp-content/uploads/2022/07/russkij-film-netflix1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="btn-panel d-flex">
                            <a href="#" class="btn btn-outline-dark">Переглянути</a>
                            <div class="btn-group ms-auto">
                                <i class="bi bi-plus-circle btn btn-outline-dark" style="font-size: 18px;"></i>
                                <i class="bi bi-send btn btn-outline-dark" style="font-size: 18px;" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" style="height: auto; max-height: 150px; overflow-x: hidden;">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://aussiedlerbote.de/wp-content/uploads/2022/07/russkij-film-netflix1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://aussiedlerbote.de/wp-content/uploads/2022/07/russkij-film-netflix1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
