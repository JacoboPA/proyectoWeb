@extends('master')
@section('title', 'Ver Todos los personajes')
@section('content')
    <style>
        .imagen {
            width: 30%;
            height: 25%;
        }

        .imagen:hover {
            opacity: 0.8;
        }

        a {
            text-decoration: none !important;
        }
    </style>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <?php $user = \Illuminate\Support\Facades\Auth::user();

                if($user->rol != 'admin'){
                ?>
                @include('shared.navbar_user')
                <div class="container col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="jumbotron">
                            <h2>No tienes permisos para acceder a ésta página</h2>
                        </div>
                    </div>
                </div>
                <?php
                }
                else{
                ?>
                @include('shared.navbar_admin')
                <div class="container col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="jumbotron">
                            <h2> Personajes de <?php $user = Auth::user(); echo $user->name;?> ,
                                como {{$user->rol}}</h2>
                        </div>

                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        @if ($personajes->isEmpty())
                            <p><h3 class="container"> No hay personajes.</h3></p>
                        @else
                    </div>
                        @foreach($personajes as $pj)


                            <div class="col-md-12 panel panel-default">

                                <a href="{{url('personajes/'.$pj->nombre)}}" class="enlace">

                                    @if($pj->imagen == '')
                                        <img class="img-circle imagen col-md-push-1"
                                             src="https://vignette.wikia.nocookie.net/icarly/images/7/76/Troll_guy.png/revision/latest?cb=20110824142105">
                                    @else
                                        <img class="img-circle imagen col-md-push-1" src="{{$pj->imagen}}">
                                    @endif
                                    <div class="collapse">

                                        <h3>Nombre: {{$pj->nombre}}</h3>
                                        <p>
                                            Clase : {{$pj->clase}}<br>
                                            Raza : {{$pj->raza}}
                                        </p>
                                    </div>
                                </a>

                                <button class="btn btn-info" data-toggle="collapse"
                                        data-target="#demo{{$pj->nombre}}" style="display: none" id="boton_info_pj">
                                    + Info
                                </button>
                                <div class="collapse" id="demo{{$pj->nombre}}">

                                    <h3>Nombre: {{$pj->nombre}}</h3>
                                    <p>
                                        Clase : {{$pj->clase}}<br>
                                        Raza : {{$pj->raza}}
                                    </p>
                                </div>
                                <div class="row">
                                    <a href="{{url('personajes/'.$pj->nombre.'/edit')}}">
                                        <button class="btn btn-light-green col-md-push-1">Modificar
                                        </button>
                                    </a>
                                    <form method="post"
                                          action="{!! action('PJController@destroy_admin',$pj->nombre) !!}">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <button class="btn btn-danger col-md-push-1">Borrar</button>
                                    </form>
                                </div>


                            </div>


                        @endforeach



                        @endif

                </div>
                <?php
                }
                ?>
            @else

                @include('shared.navbar_sin_user')

            @endauth
        </div>
    @endif



@endsection﻿