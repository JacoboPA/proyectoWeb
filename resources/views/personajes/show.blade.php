@extends('master')
@section('title',$pj->nombre)
@section('content')
    <style>


        .card {
            background-color: #778899;
            color: lightgrey;
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
                    <h3><strong>{{$pj->nombre}} ( {{$pj->raza}})</strong></h3>
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
                    @if($pj->clase == 'Mago')
                        <ul>
                            <li>
                                <strong>Competencia con armas y armaduras:</strong> los magos son competentes con
                                las siguientes
                                armas: ballesta (tanto ligera como pesada), bastón, clava y daga. No son competentes
                                con ningún tipo de armadura ni con los escudos. Cualquier tipo de armadura supondrá
                                un obstáculo para los movimientos del mago, lo cual puede hacer que fallen sus
                                conjuros (siempre y cuando éstos posean componentes somáticos).
                            </li>
                            <li>
                                <strong>Conjuros:</strong> los magos lanzan conjuros arcanos (el mismo tipo de
                                conjuros disponible
                                para hechiceros y bardos), elegidos de la lista de conjuros de hechicero/mago. Un
                                mago debe elegir y preparar sus conjuros con antelación (ver más adelante).
                            </li>
                            <li>
                                <strong>Idiomas adicionales:</strong> el mago puede reemplazar uno de los idiomas
                                adicionales de que
                                disponga gracias a su raza por el dracónico. Muchos de los viejos volúmenes de magia
                                están escritos en dracónico y la mayoría de aprendices de mago lo aprenden como
                                parte de sus estudios.
                            </li>
                            <li>
                                <strong>Familiar:</strong> el mago puede adquirir un familiar exactamente del mismo
                                modo que un hechicero.
                            </li>
                        </ul>

                    @elseif($pj->clase=='Pícaro')
                        <ul>
                            <li>
                                <strong>Competencia con armas y armaduras:</strong> el entrenamiento armamentístico
                                del picar se
                                centra en las armas que sean aptas para el sigilo y los ataques furtivos. Por tanto,
                                todos ellos son competentes con las siguientes armas: Arco Corto (normal y
                                compuesto), Cachiporra, Ballesta (ligera o pesada), Daga (cualquier tipo), Dardo,
                                Espada Corta y Maza Ligera. Los pícaros de tamaño Mediano son también competentes
                                con ciertas armas, fáciles de usar y ocultar que, sin embargo, son demasiado grandes
                                para los de tamaño pequeño: Ballesta Pesada, Bastón, Clava, Estoque, Maza de Armas,
                                Maza Pesada. Los picaros son competentes con las Armaduras ligeras pero no con los
                                escudos. Nótese que los penalizadores por vestir una armadura más pesada que la de
                                cuero se aplican a las habilidades: Equilibrio, Escapismo, Esconderse, Hurtar,
                                Moverse sigilosamente, Piruetas, Saltar y Trepar. Además, los pruebas de Nadar
                                sufren un penalizador de -1 por cada 5 libras de armadura, equipo y botín que se
                                porten
                            </li>
                            <li>
                                <strong>Ataque furtivo:</strong> cuando "pilla" a su oponente en un momento en que
                                sea incapaz de
                                defenderse eficazmente de su ataque, el pícaro puede alcanzar un punto vital para
                                infligir mayor daño.
                            </li>
                            <li>
                                <strong>Trampas:</strong> los picaros (y solo ellos) pueden utilizar la habilidad de
                                buscar cuando en
                                la tarea en cuestión tenga una Clase de Dificultad superior a 20. Encontrar una
                                trampa cuya naturaleza no sea mágica tiene una CD mínima de 20 (y mas, si esta bien
                                escondida). Encontrar una que sea mágica tendrá una CD de 25 + el nivel del conjuro
                                utilizado para crearla.
                            </li>
                        </ul>

                    @elseif($pj->clase=='Guerrero')
                        <ul>
                            <li>
                                <strong>Competencia con armas y armaduras:</strong><br/> los guerreros son
                                competentes contodas las armas
                                sencillas y marciales, con todas las armaduras (pesadas, intermedias y ligeras) y
                                con los escudos (incluidos los escudos paveses)
                            </li>
                            <li>
                                <strong>Equipo:</strong></li>
                            <br/>
                            Armadura pesada,espada,escudo y mochila con provisiones.
                            </li>

                        </ul>

                    @endif


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

            <div class="row">
                <form class="col-md-4 col-md-push-2" method="post"
                      action="{!! action('PJController@destroy',$pj->nombre) !!}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div>
                        <button class="btn btn-danger">Borrar</button>
                    </div>
                </form>
                <div class="col-md-4 col-md-push-2">
                    <button class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Imprimir como PDF
                    </button>
                </div>
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
