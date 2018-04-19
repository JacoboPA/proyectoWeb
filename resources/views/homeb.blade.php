@extends('master')
@section('title', 'Mordheim')
@section('content')
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
    <div class="col-md-8 col-md-push-2">


        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">


                <div class="item active">
                    <img src="https://media.playstation.com/is/image/SCEA/warhammer-end-times-vermintide-teamup-screen-02-ps4-us-19sep16.png?$MediaCarousel_Original$"
                         alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Combate en <strong>equipo!</strong></h3>

                    </div>
                </div>
                <div class="item ">
                    <img src="https://game-insider.com/wp-content/uploads/2016/10/Mordheim-City-of-the-Damned.jpg"
                         alt="Los Angeles" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Sacerdote guerrero</h3>
                        <p>Siente el increible poder del imperio</p>
                    </div>

                </div>
                <div class="item">
                    <img src="https://media.playstation.com/is/image/SCEA/warhammer-end-times-vermintide-map-01-ps4-us-13sep16?$MediaCarousel_Original$"
                         alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Uberseirk</h3>
                        <p>Defiende la ciudad de las hordas</p>
                    </div>
                </div>
                <div class="item">
                    <img src="https://steamcdn-a.akamaihd.net/steam/apps/534990/ss_74c1b3b8023fda0a61cb21638062b9ed90d44b14.1920x1080.jpg?t=1478077776"
                         alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Condes Vampiro</h3>
                        <p>Ponte en la piel de todo un vampiro</p>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
    <div class="col-md-8 col-md-push-2" id="main">
        <article id="contenido_texto">

            <div class="row">

                <article class="panel col-md-12" id="informacionUno">

                    <h2><strong>La historia</strong></h2>
                    <p>
                        La acción se sitúa en la ciudad de Mordheim, en el año 1999,
                        unos 500 años antes de la cronología de Warhammer Fantasy. (Traducido del alemán Mordheim
                        significa
                        "Ciudad
                        de la Muerte", para evitar connotaciones negativas el título en Alemania fue cambiado a
                        Mortheim).
                    </p>

                    <div class="mas" style="display: none;">
                        <p>
                            En el año 1999, el Imperio se encuentra sumido en una guerra civil desde hace muchos
                            años,
                            no
                            hay
                            Emperador en el trono y los restos del Imperio son objeto de luchas intestinas. Ese
                            mismo
                            año un
                            cometa
                            de
                            dos colas (el símbolo de Sigmar, dios del Imperio) fue visto en el cielo. Los astrónomos
                            predijeron
                            que
                            caería
                            en la ciudad de Mordheim, donde se encontraba el convento de las Hermanas de Sigmar. La
                            caída de
                            este
                            cometa se
                            interpretó como el retorno de Sigmar, durante el cual se volvería a vivir una época
                            dorada.
                            Se
                            organizaron viajes a
                            Mordheim llenando la ciudad por encima de su capacidad. La superpoblación, junto con el
                            ambiente
                            que
                            se
                            vivía en la
                            época, hizo que la ciudad se convirtiera en un nido de adulterio, depravación y
                            libertinaje,
                            aumentando
                            el estado
                            de anarquía. Conforme se acercaba el momento del impacto del cometa, más y más gente se
                            acercaba
                            a
                            Mordheim, y la
                            situación empeoró. Los demonios empezaron a recorrer las calles como hombres, las
                            semillas
                            del
                            Caos
                            reclamaban la
                            ciudad como suya tras haberse hecho dueños de las almas de los habitantes.
                        </p>
                        <p>
                            El cometa cayó en nochevieja pero no sucedió el prometido retorno de Sigmar.
                            El cometa impactó en la ciudad matando instantáneamente a aquellos que se
                            encontraban cerca. Se creó el rumor que Sigmar había juzgado y eliminado a quienes
                            había considerado indignos. Mordheim se convirtió en un lugar de miedos y paranoias.
                            Al poco del suceso, corrió la voz que una piedra misteriosa se había extendido por la
                            ciudad,
                            dicha piedra se conoció como Piedra Bruja que tenía la reputación de poseer todo tipo de
                            cualidades.
                            Pronto distintas facciones empezaron a ofrecer sumas de dinero enormes por esta piedra
                            así
                            que
                            muchas
                            bandas comenzaron a llegar a Mordheim, ahora conocida como la Ciudad de los Condenados,
                            para
                            conseguir
                            una fortuna vendiéndola.
                        </p>
                        <p>
                            Unos 300 años después, una vez acabada la Gran Guerra contra el Caos,
                            Magnus el Pio el Salvador del Imperio arrasó los restos de Mordheim e
                            hizo que se erradicara su nombre de todo texto.
                        </p>


                        <div class="text-center">
                            <img src="http://cdn.edgecast.steamstatic.com/steam/apps/276810/ss_e2f53a79fafb4cb04b1bc005a5b53d80f503b4ab.1920x1080.jpg?t=1515087852"
                                 width="100%" height="auto" alt="">
                        </div>
                    </div>
                    <button class="btn btn-success enlace">Leer más+</button>


                </article>
            </div>

        </article>
    </div>





@endsection
