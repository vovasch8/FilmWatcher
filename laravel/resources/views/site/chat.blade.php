@extends("layouts.site")

@section("title-block") Чати @endsection

@section("content")
    <div class="container">
        <div class="row gx-3">
            <div class="col-lg-4 bg-light">
                <h3 class="text-center mt-3">Чати</h3>
                <hr>
                <div class="row mt-3">
                    <a href="" class="friend hstack mt-3 ms-5 link-dark text-decoration-none">
                        <img width="70px" height="70px" src="https://s2.afisha.ru/mediastorage/f8/40/44c361537e354921a5a5266240f8.jpg" alt="friend" class="rounded-circle">
                        <p class="fw-bold ms-3">NickName</p>
                    </a>
                    <a href="" class="friend hstack mt-3 ms-5 link-dark text-decoration-none">
                        <img width="70px" height="70px" src="https://s2.afisha.ru/mediastorage/f8/40/44c361537e354921a5a5266240f8.jpg" alt="friend" class="rounded-circle">
                        <p class="fw-bold ms-3">NickName</p>
                    </a>
                    <a href="" class="friend hstack mt-3 ms-5 link-dark text-decoration-none">
                        <img width="70px" height="70px" src="https://s2.afisha.ru/mediastorage/f8/40/44c361537e354921a5a5266240f8.jpg" alt="friend" class="rounded-circle">
                        <p class="fw-bold ms-3">NickName</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 bg-light ">
                <div class="chat-entity">
                    <div class="friend hstack mt-3">
                        <img width="70px" height="70px" src="https://s2.afisha.ru/mediastorage/f8/40/44c361537e354921a5a5266240f8.jpg" alt="friend" class="rounded-circle">
                        <p class="fw-bold ms-3">NickName</p>
                    </div>
                    <div class="message">
                        <div style="max-width: 250px;" class="card">
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
                </div>
                <div class="chat-entity">
                    <div class="person hstack mt-3 float-end">
                        <p class="fw-bold">NickName</p>
                        <img width="70px" height="70px" src="https://s2.afisha.ru/mediastorage/f8/40/44c361537e354921a5a5266240f8.jpg" alt="friend" class="rounded-circle ms-3">
                    </div>
                    <div class="message float-end mt-3">
                        <div style="max-width: 250px;" class="card">
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
                </div>
            </div>
        </div>
    </div>
@endsection
