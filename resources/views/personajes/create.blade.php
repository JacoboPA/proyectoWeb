@extends('master')
@section('title', 'Crea tu PJ')

@section('content')
    <style>
        #seleccion_clase, #seleccion_raza {
            text-align: center
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
        <div class="well well bs-component" id="creacion_pj">

            <form class="form-horizontal" method="post">
                <!--las siguientes líneas nos muestran los errores a la hora de recorrer el array de la peticion http-->
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach

                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Creación de Personaje</legend>

                    <div class="form-group" id="seleccion_clase">
                        <div class="row">
                            <label for="title" class="col-lg-2 control-label">Clase</label>

                        </div>
                        <div class="row">
                            <label class="radio-inline"><input type="radio" name="clase" value="Mago" class="clase">Mago</label>
                            <label class="radio-inline"><input type="radio" name="clase" value="Pícaro" class="clase">Pícaro</label>
                            <label class="radio-inline"><input type="radio" name="clase"
                                                               value="Guerrero" class="clase">Guerrero</label>

                        </div>

                    </div>

                    <div class="form-group" id="seleccion_raza">
                        <div class="row col-md-push-1">
                            <label for="content" class="col-lg-2 control-label">Raza</label>

                        </div>
                        <div class="row">
                            <label class="radio-inline"><input type="radio" name="raza" value="Elfo" class="raza">Elfo</label>
                            <label class="radio-inline"><input type="radio" name="raza" value="Humano" class="raza">Humano</label>
                            <label class="radio-inline"><input type="radio" name="raza" value="Enano" class="raza">Enano</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" rows="1" id="nombre" name="nombre"></textarea>
                            <span class="help-block">Nombre del personaje</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Descripción</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" rows="3" id="historia" name="historia"></textarea>
                            <span class="help-block">Breve descripción de tu personaje(historia , apariencia...) Introduce cada párrafo seguido de \n</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Avatar</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" rows="1" id="content" name="imagen"></textarea>
                            <span class="help-block">Avatar de tu personaje(inserta una url)</span>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-dark-green" id="crear_personaje">Enviar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="row">
            <img src="/imagenes/personajes.jpg" width="100%">
        </div>
    </div>
@endsection