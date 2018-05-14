@extends('master')
@section('title', 'Edita tu personaje')

@section('content')
    <style>
        #imagen_subida{
            position: absolute;
            left: 110px;
            top:120px;
        }
    </style>
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <fieldset>
                    <legend>Edicion de Personaje</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                   value="{!! $personaje->nombre !!}">
                        </div>
                    </div>


                    <div class="row">
                        <article class="col-md-5 col-md-push-1">
                            @if($personaje->imagen == '')
                                <img src="https://vignette.wikia.nocookie.net/icarly/images/7/76/Troll_guy.png/revision/latest?cb=20110824142105"
                                     class="animated tada infinite">
                            @elseif($personaje->imagen[0]=='h')
                                <img class="img-circle imagen col-md-push-1 animated bounce" width="90%" src="{{$personaje->imagen}}">
                            @else
                                <img class="img-circle imagen col-md-push-1 animated bounce" width="90%" src="/avatares/{{$personaje->imagen}}">
                            @endif
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a3/Lightness_rotate_36f_cw.gif" style="display: none" width="40%"   id="imagen_subida">
                        </article>

                        <div class="col-md-4 col-md-push-1">
                            <input type="text" id="imagen" name="imagen" value="{{$personaje->imagen}}"
                                   class="form-control" placeholder="cambia tu avatar">

                            <input name="archivo" type="file" id="archivo_subida" >
                        </div>

                        <div class="row col-md-5 col-md-push-1">
                            <div class="col-md-12">
                                <textarea class="form-control" rows="20" id="historia"
                                          name="historia">{{$personaje->historia}}</textarea>

                            </div>
                        </div>
                    </div>

                </fieldset>
                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>

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
