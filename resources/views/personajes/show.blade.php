@extends('master')
@section('title',$pj->nombre)
@section('content')
    <style>


        .card {
            background-color: #778899;
            color: lightgrey;
        }

        #imagen_pj img {
            width: 100%;
        }

    </style>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <?php $user = \Illuminate\Support\Facades\Auth::user();

                if($user->rol != 'admin'){
                ?>
                @include('shared.navbar_user')
                <?php
                }
                else{
                ?>
                @include('shared.navbar_admin')
                <?php
                }
                ?>
            @else

                @include('shared.navbar_sin_user')

            @endauth
        </div>
    @endif

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel" id="personaje_info">


            <div class="row">
                <div class="col-md-6 atributos">
                    <h3><strong>{{$pj->nombre}}</strong></h3>
                    <h4><strong>{{$pj->raza}}</strong></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 atributos">
                    <table class="col-md-12">

                    </table>
                </div>
            </div>
            <div class="row" id="personaje_clase">
                <div class="card col-md-12">

                    <h4>{{$pj->clase}}</h4>

                </div>
            </div>
            <div class="row"><!--Habilidades propias de la clase por defecto..-->

                <article class="col-md-5 col-md-push-1">
                    <h3>Habilidades de Clase</h3>
                    <ul>
                        @foreach($habilidades as $habilidad)

                            <li>
                                <strong>{{$habilidad->habilidad}}:</strong><br/>
                                {{$habilidad->descripcion}}
                            </li>



                        @endforeach
                        <li>
                            <strong>Equipo:</strong></li>
                        <br/>
                        Armadura pesada,espada,escudo y mochila con provisiones.
                        </li>
                    </ul>





                </article>

                <article class="col-md-5 col-md-push-1" id="imagen_pj">
                    @if($pj->imagen == '')
                        <img src="https://vignette.wikia.nocookie.net/icarly/images/7/76/Troll_guy.png/revision/latest?cb=20110824142105">
                    @elseif($pj->imagen[0]=='h')
                        <img class="img-circle imagen col-md-push-1" src="{{$pj->imagen}}">
                    @else
                        <img class="img-circle imagen col-md-push-1" src="/avatares/{{$pj->imagen}}">
                    @endif
                </article>
            </div>

            <div class="row" id="personaje_historia">
                <div class="card col-md-12">
                    <h2>Historia</h2>
                </div>
            </div>

            <div class="row">
                <div class="text col-md-12">
                    <article>
                        {{$pj->historia}}
                    </article>
                </div>
            </div>
            <form method="get" action="{!! action('PJController@print',$pj->nombre) !!}">
                <div class="col-md-4 col-md-push-2">

                    <a href="{{route('personajes.pdf')}}">
                        <button class="btn btn-primary">PDF</button>
                    </a>

                </div>
            </form>
            <div class="row">
                <form class="col-md-4 col-md-push-2" method="post"
                      action="{!! action('PJController@destroy',$pj->nombre) !!}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div>
                        <button class="btn btn-danger">Borrar</button>
                    </div>
                </form>


                <div class="col-md-4 col-md-push-2">
                    <a href="{{url('personajes/')}}">
                        <button class="btn btn-info">Atras</button>
                    </a>
                </div>
            </div>


            <div class="clearfix"></div>
        </div>
    </div>
@endsection
