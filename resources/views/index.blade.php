@extends('master_juegos')
@section('title', 'Mordheim')
@section('content')
    <body>
    <div class="row">
        <div class="col-md-12 encabezado">
            <h1>Rol y Juegos de Mesa</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-push-1">
            <div class="col-md-3 ambientaciones  animate" data-animate="bounceIn" data-duration="1.0s"
                 data-delay="0.1s">
                <a href="/inicio">Mordheim</a>
            </div>
            <div class="col-md-3  ambientaciones animate" data-animate="bounceIn" data-duration="1.0s"
                 data-delay="0.1s">
                <a href="#">Dungeons & World</a>
            </div>
            <div class="col-md-3  ambientaciones animate" data-animate="bounceIn" data-duration="1.0s"
                 data-delay="0.1s">
                <a href="#">La sombra del rey demonio</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-push-1">
            <div class="col-md-3 ambientaciones animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.1s">
                <a href="#">Warhammer</a>
            </div>
            <div class="col-md-3 ambientaciones animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.1s">
                <a href="#">Dungeons & Dragons</a>
            </div>
            <div class="col-md-3 ambientaciones animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.1s">
                <a href="#">La sombra del rey demonio</a>
            </div>
        </div>
    </div>
    </body>
@endsection