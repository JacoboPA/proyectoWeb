@extends('master')
@section('title', 'Ver Todos los personajes')
@section('content')
    <style>
        .imagen {
            width: 50%;
            height: 30%;
        }

        .imagen:hover {
            opacity: 0.8;
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

                            <div class="col-md-4">

                                <a href="{{url('personajes/'.$pj->nombre)}}">

                                    @if($pj->imagen == '')
                                        <img class="img-circle imagen col-md-push-1"
                                             src="https://vignette.wikia.nocookie.net/icarly/images/7/76/Troll_guy.png/revision/latest?cb=20110824142105">
                                    @else
                                        <img class="img-circle imagen col-md-push-1" src="{{$pj->imagen}}">
                                    @endif

                                </a>


                                <a href="{{url('personajes/'.$pj->nombre.'/edit')}}">
                                    <button class="btn btn-light-green col-md-push-1">Modificar
                                    </button>
                                </a>


                            </div>


                            <?php $existe += 1;?>



                        @endif
                    @endforeach
                </div>
                <div class="row">
                    <button class="btn btn-danger col-md-push-1">Borrar Todos</button>
                </div>
                @if($existe == 0)
                    <p><h3>No hay personajes creados </h3></p>
                @endif


            @endif
        </div>
    </div>

@endsection﻿
