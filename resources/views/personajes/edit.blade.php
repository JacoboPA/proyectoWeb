@extends('master')
@section('title', 'Edita tu personaje')

@section('content')
    <style>
        #imagen_subida {
            position: absolute;
            left: 450px;
            top: 50px;
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
        <div class="well well bs-component">
            <h3 class="jumbotron">Edicion de Personaje</h3>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"
                  action="{{url('/personajes/'.$personaje->getNombre().'/edit')}}" id="avatarForm">

                <div class="row">
                    <article class="col-md-12">
                        <img class="col-md-push-1 animated bounce imagen_pj" width="90%"
                             src="{{$personaje->getAvatar()}}" id="{{$personaje->nombre}}_imagen">


                        <img src="https://camo.githubusercontent.com/dfc90c7a7bef0ed515007aa2527e9a6abe18f90a/687474703a2f2f66696c652e62616978696e672e6e65742f3230313531312f30383034303862616339353739613037353030633231326534306262393665652e676966"
                             style="display: none" width="30%" id="imagen_subida">
                    </article>
                </div>


                {{ csrf_field() }}
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="row">
                    <div class="col-lg-5 col-lg-push-1">

                        <input name="archivo" type="file" id="archivo_subida">
                    </div>

                </div>
                <div class="row">

                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-5 col-lg-push-1">
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                   value="{!! $personaje->getNombre() !!}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Avatar</label>
                        <div class="col-lg-5 col-lg-push-1">
                            <input type="text" id="imagen" name="imagen" value="{{$personaje->imagen}}"
                                   class="form-control" placeholder="cambia tu avatar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Historia
                        </label>
                        <div class="col-lg-5 col-lg-push-1">
                                <textarea class="form-control" rows="10" id="historia"
                                          name="historia">{{$personaje->historia}}</textarea>

                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Modificar</button>
            </form>

        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="{{url('/personajes')}}">
                    <button class="btn btn-danger">Cancelar edicion</button>
                </a>
            </div>
        </div>

    </div>
    </div>
@endsection
