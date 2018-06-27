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
                <p>
                    <a href="/PJcreate">
                        <button class="btn btn-info">Crear Personaje</button>
                    </a>
                </p>
            @else


                <div class="row">
                    @foreach($personajes as $pj)

                        @if($pj->name == $user->name)

                            <div class="col-md-4">

                                <a href="{{url('personajes/'.$pj->nombre)}}" class="enlace">
                                    <img class="img-circle imagen col-md-push-1" src="{{$pj->getAvatar()}}">
                                    <div class="collapse">

                                        <h3>Nombre: {{$pj->nombre}}</h3>
                                        <p>
                                            @if($pj->clase != 'Mago' || 'Guerrero' || 'Picaro')
                                                Clase : Sin clase <br>
                                            @else
                                                Clase : {{$pj->clase}}<br>
                                            @endif
                                            @if($pj->raza != 'Humano' || 'Elfo' || 'Enano')
                                                Raza : Sin raza
                                            @else
                                                Raza : {{$pj->raza}}
                                            @endif
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
                                        @if($pj->clase != 'Mago' || 'Guerrero' || 'Picaro')
                                            Clase : Sin clase <br>
                                        @else
                                            Clase : {{$pj->clase}}<br>
                                        @endif
                                        @if($pj->raza != 'Humano' || 'Elfo' || 'Enano')
                                            Raza : Sin raza
                                        @else
                                            Raza : {{$pj->raza}}
                                        @endif
                                    </p>
                                </div>
                                <div class="row">
                                    <a href="{{url('personajes/'.$pj->nombre.'/edit')}}">
                                        <button class="btn btn-light-green col-md-push-1">Modificar
                                        </button>
                                    </a>
                                    <form method="post"
                                          action="{!! action('PJController@destroy',$pj->nombre) !!}">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <button class="btn btn-danger col-md-push-1">Borrar</button>
                                    </form>


                                </div>


                            </div>






                        @endif
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-push-2">
                        {{$personajes->links()}}

                    </div>

                </div>

                <div class="row">
                    <form method="post"
                          action="{!! action('PJController@delete_all') !!}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <button class="btn btn-danger col-md-push-1">Borrar Todos</button>
                    </form>

                </div>



            @endif
        </div>
    </div>

@endsection﻿
