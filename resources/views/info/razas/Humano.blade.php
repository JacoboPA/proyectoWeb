@extends('master')
@section('title', 'Humanos')
@section('content')

    <style>

        #contenido_humanos {
            color: white;
            padding-bottom: 2vh;
        }
        #contenido_humanos p{
            padding: 5vh;
        }
        #contenido_humanos img{
            padding: 5vh;
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
        <main>
            <div class="row" id="humanos">
                <div class="col-md-5 panel animated fadeInDown">
                    <h2>Humanos</h2>
                </div>
                <div class="col-md-5 col-md-push-3">
                    <img src="/imagenes/Imperio.png">
                </div>
            </div>

            <div class="row" id="contenido_humanos">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            Los Enanos son una de las razas más antiguas del Mundo de Warhammer. Las Montañas del Fin del
                            Mundo,
                            la
                            vasta y adusta cadena montañosa que da forma a la frontera Este del Viejo Mundo, ha sido su
                            hogar
                            desde
                            el principio de los tiempos. En el pasado, fue aquí donde los Enanos construyeron sus
                            gigantescas
                            fortalezas subterráneas; entre altas montañas e interminables abismos.
                        </p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            En su momento de apogeo, su reino (llamado Karaz-Ankor) iba desde el punto más al Norte de dicha
                            cadena al punto más al Sur y sus minas llegaban muy por debajo de la superficie de la tierra.
                            Hace
                            tiempo que estos días de gloria terminaron y muchas de sus fortalezas están en ruinas u ocupadas
                            por
                            malvadas criaturas, y sus logros del pasado no son más que recuerdos, viejas sagas que se cantan
                            en
                            los salones medio vacíos de las pocas fortalezas Enanas que siguen en pie. No obstante aun
                            tienen la
                            suficiente fuerza como para intentar resurgir y presentar batalla a sus múltiples enemigos.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p >
                            En la actualidad, los Enanos han intentado recuperar alguna de sus fortalezas caídas y han
                            conseguido grandes victorias para mantener aunque sea una sala de dichos lugares en su poder.
                        </p>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12">
                        <img src="/imagenes/Imperio2.jpg"  width="100%">
                    </div>
                </div>
            </div>


        </main>
    </div>

@endsection