@extends('master_juegos')
@section('title', 'Mordheim')
@section('content')
    <style>


        li:before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 4px;
            width: 0;
            background-color: #97ae51;
            animation: width 0.5s;
            transition: all 0.4s;
            border-radius: 2px;
        }

        li:hover:before {
            width: 50%;
        }

        .container div {
            padding-top: 2vh;
            color: white;
            font-size: large;
        }

        .container div img {
            transition: transform .2s;
            transition: .2s;
        }

        .container div img:hover {
            transform: scale(1.1);
            border-radius: 100px;
            opacity: 0.5;

        }

        .fondo {
            background-image: url("https://dcgamedevblog.files.wordpress.com/2014/09/game-bg-1.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;

        }


    </style>

    <div>
        <img src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/gallery_big/public/media/image/2016/11/mass-effect-andromeda_3.jpg?itok=HbVQLoOD"
             width="100%" height="80%">
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light " id="barra">
        <a class="navbar-brand" href="#">RolGame</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02" id="barra">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quienes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dudas y preguntas</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="fondo">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="/inicio">
                        <div class="panel-body"><img src="http://mordheim-cityofthedamned.com/home/img/mordheim-55.jpg"
                                                     class="img-responsive" style="width:100%" height="50%" alt="Image">
                        </div>
                        <div class="panel-footer">Mordheim</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="panel-body"><img
                                    src="https://vignette.wikia.nocookie.net/warhammerfb/images/e/ee/Third_Battle_of_Black_Fire_Pass.jpg/revision/latest?cb=20150716213254"
                                    class="img-responsive" height="50%" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Warhammer</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="panel-body"><img
                                    src="https://i0.wp.com/julioromacho.net/wp-content/uploads/2017/07/munchkin-1.png?fit=620%2C361"
                                    class="img-responsive" style="width:100%" height="50%" alt="Image"></div>
                        <div class="panel-footer">Munchkin</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <a href="#">
                        <div class="panel-body"><img
                                    src="http://cdn.playbuzz.com/cdn/b58bcc4d-e6fc-44d5-a699-2e86ec43ecd0/5bcaa381-79fe-4070-b2c6-b299309f8f1a.jpg"
                                    class="img-responsive" style="width:100%" height="50%" alt="Image"></div>
                        <div class="panel-footer">Dungeons & Dragons</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="panel-body"><img
                                    src="http://www.warpig-games.cl/3664-large_default/dungeon-world.jpg"
                                    class="img-responsive" style="width:100%" height="50%" alt="Image"></div>
                        <div class="panel-footer">Dungeons World</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="panel-body"><img
                                    src="https://i2.wp.com/collectible506.com/wp-content/uploads/2017/06/maxresdefault-20.jpg?resize=672%2C372&ssl=1"
                                    class="img-responsive" style="width:100%" height="50%" alt="Image"></div>
                        <div class="panel-footer">Zombicide</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection