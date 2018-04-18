@extends('master')
@section('title', 'Ver Todos los personajes')
@section('content')
    <style>
        img {
            border-radius: 300px;
        }
    </style>

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="jumbotron">
                <h2> Personajes de <?php $user = Auth::user(); echo $user->name;?></h2>
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
        <div id="main2">
            @foreach($personajes as $pj)


                    <div class="panel panel_personaje">
                        <div id="ficha_personaje">
                            <div class="row">
                                <a href="{{url('personajes/'.$pj->nombre)}}"><h3><strong
                                                class="col-md-4">{{$pj->nombre}}</strong></h3></a>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mas" style="display: none;">
                                    @if($pj->imagen == '')
                                        <img src="https://vignette.wikia.nocookie.net/icarly/images/7/76/Troll_guy.png/revision/latest?cb=20110824142105">
                                    @else
                                        <img src="{{$pj->imagen}}" width="50%" height="40%">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn btn-dark-green enlace" id="Mostrar">Mostrar
                                </button>
                                </a>
                            </div>


                            <div class="col-md-2 col-md-push-3">
                                <a
                                        href="{{url('personajes/'.$pj->nombre.'/edit')}}">
                                    <button class="btn btn-light-green">Modificar
                                    </button>
                                </a>
                            </div>

                        </div>


                    </div>


            @endforeach



            @endif

        </div>
    </div>

@endsection﻿