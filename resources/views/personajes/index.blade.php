@extends('master')
@section('title', 'Ver Todos los personajes')
@section('content')
    <style>
        img {
            border-radius: 300px;
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

        <div class="panel panel-default">


                <div class="jumbotron ">
                    <h2> Personajes de ...<?php $user = Auth::user(); echo $user->name;?></h2>
                </div>

            <div class="row">
                @if(session('status'))



                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
            </div>
            @if ($personajes->isEmpty())
                <p><h3 class="container"> No hay personajes.</h3></p>
            @else

                <?php $existe = 0;?>
                <div class="row">
                    @foreach($personajes as $pj)

                        @if($pj->name == $user->name)

                            <div class="panel panel_personaje col-md-3">
                                <div id="ficha_personaje">
                                    <div class="row">
                                        <a href="{{url('personajes/'.$pj->nombre)}}"><h3><strong
                                                        class="col-md-4">{{$pj->nombre}}</strong></h3></a>
                                        <label class="col-md-6 col-md-push-2 enlace">Mostrar <span
                                                    class="caret"></span></label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12  mas" style="display: none;" id="avatar_pj">
                                            
                                            @if($pj->imagen == '')
                                                <img src="https://vignette.wikia.nocookie.net/icarly/images/7/76/Troll_guy.png/revision/latest?cb=20110824142105">
                                            @else
                                                <img src="{{$pj->imagen}}" width="100%" height="30%">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-md-2 col-md-push-1">
                                        <a
                                                href="{{url('personajes/'.$pj->nombre.'/edit')}}">
                                            <button class="btn btn-light-green">Modificar
                                            </button>
                                        </a>
                                    </div>

                                </div>


                            </div>


                            <?php $existe += 1;?>



                        @endif
                    @endforeach
                </div>
                <div>
                    <button class="btn btn-danger">Borrar Todos</button>
                </div>
                @if($existe == 0)
                    <p><h3>No hay personajes creados </h3></p>
                @endif


            @endif
        </div>
    </div>

@endsection﻿
