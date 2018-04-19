@extends('master_juegos')
@section('title', 'Mordheim')
@section('content')
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="myCarousel" class="carousel" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="https://i.ytimg.com/vi/CSJKYidKIeM/maxresdefault.jpg" alt="Los Angeles">
                            <div class="carousel-caption">
                                <h1>Munchkin</h1>
                            </div>
                        </div>

                        <div class="item">
                            <img src="https://i.pinimg.com/originals/ca/82/e4/ca82e4a216bfaceaae89a5c7237cd852.png"
                                 alt="Chicago">
                            <div class="carousel-caption">
                                <h1>La sombra del Rey demonio</h1>
                            </div>
                        </div>

                        <div class="item">
                            <img src="http://1.bp.blogspot.com/-QULbRuqE_9k/U44JxuV11GI/AAAAAAAAE7M/d4NQW7WM6oI/s1600/warhammer1.jpg"
                                 alt="New York">
                            <div class="carousel-caption">
                                <h1>Warhammer Fantasy</h1>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-5 ambientaciones  animate" data-animate="bounceIn" data-duration="1.0s"
                     data-delay="0.1s">
                    <a href="/inicio">Mordheim</a>
                </div>
                <div class="col-md-5  ambientaciones animate" data-animate="bounceIn" data-duration="1.0s"
                     data-delay="0.1s">
                    <a href="#">Dungeons & World</a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-5 ambientaciones  animate" data-animate="bounceIn" data-duration="1.0s"
                     data-delay="0.1s">
                    <a href="/inicio">Mordheim</a>
                </div>
                <div class="col-md-5  ambientaciones animate" data-animate="bounceIn" data-duration="1.0s"
                     data-delay="0.1s">
                    <a href="#">Dungeons & World</a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-5 ambientaciones  animate" data-animate="bounceIn" data-duration="1.0s"
                     data-delay="0.1s">
                    <a href="/inicio">Mordheim</a>
                </div>
                <div class="col-md-5  ambientaciones animate" data-animate="bounceIn" data-duration="1.0s"
                     data-delay="0.1s">
                    <a href="#">Dungeons & World</a>
                </div>

            </div>
        </div>
    </div>
    </body>
@endsection