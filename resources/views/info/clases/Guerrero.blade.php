@extends('master')
@section('title', 'Guerrero')
@section('content')
    <style>

        #contenido_guerrero {
            color: white;
            padding-bottom: 3vh;
        }

        .logo_clase img {
            padding-top: 3vh;
        }

        #contenido_guerrero p{
            padding: 5vh 5vh 2vh 5vh;
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
            <div class="row" id="Enanos">
                <div class="col-md-5 panel animated fadeInDown">
                    <h2>Guerrero</h2>
                </div>
                <div class="col-md-5 col-md-push-3 logo_clase">
                    <img src="/imagenes/Warrior.png" width="50%" height="50%" class="animated rubberBand">
                </div>
            </div>

            <div class="row" id="contenido_guerrero">
                <div class="row">
                    <div class="col-md-6">
                        <p  >
                            A esta clase pertenecen el caballero embarcado en una búsqueda, el señor feudal dedidado a la
                            conquista, el campeón del rey, el infante de élite, el mercenario veterano y el rey bandido. Los
                            guerreros pueden ser leales defensores de los necesitados, crueles merodeadores o valientes
                            aventureros. Algunos son bellísimas personas dispuestos a enfrentarse a la muerte a cambio de un
                            bien mayor. Sin embargo, otros se encuentran entre las peores gentes que es posible hallar: las
                            que matan sin escrúpulos para obtener un beneficio personal, o incluso por deporte. Los
                            guerreros que no van de aventuras pueden ser soldados, guardias, guardaespaldas, campeones o
                            matones dedicados al crimen. Los seguidores de esta clase que se van de aventuras se llaman a sí
                            mismos guerreros, mercenarios, sicarios o, simplemente, aventureros.
                        </p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            <strong>Aventuras:</strong> la mayoría de los guerreros consideran que las aventuras, asaltos y
                            misiones peligrosas son su labor. Algunos tienen jefes que les pagan regularmente, mientras que
                            otros prefieren vivir igual que los que buscan yacimientos de mineral, corriendo grandes riesgos
                            con la esperanza de conseguir un botín de iguales proporciones. Ciertos guerreros osn más
                            cívicos y utilizan sus habilidade de combate para proteger a los que corren peligro y no tienen
                            posibilidades de defenderse por sí mismos. Sin embargo, sean cuales fueren sus motivaciones
                            originales, los guerreros suelen terminar sucumbiendo a la emoción del combate y la aventura.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            <strong>Peculiaridades:</strong> de todas las clases, la del guerrero es la mejor capacitada
                            para el combate (de ahí su nombre). Los guerreros están familiarizados con todas las armas y
                            armaduras corrientes. Además de su potencial para el combate en general, todo guerrero
                            desarrolla especialidades de carácter propio. Uno de ellos podría estar particularmente
                            capacitado para usar ciertas armas y otro podría estarlo para ejecutar maniobras insólitas. A
                            medida que adquieren experiencia, consiguen más oportunidades para desarrollar sus habilidades
                            marciales. Gracias a su dedicación a las maniobras de combate, pueden dominar relativamente
                            rápido incluso las más difíciles.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p >
                            <strong>Alineamineto:</strong>
                            los guerreros pueden ser de cualquier alineamiento. Los guerreros buenos suelen ser cruzados y
                            dedicarse a la persecución y erradicación del mal. Los legales podrían ser campeones que
                            defendieran las tierras de su señor o a los que vivan en ellas. Los guerreros caóticos pueden
                            ser mercenarios vagabundos. Los guerreros malignos tienden a ser matones y villanos mezquinos
                            que se limitan a tomar todo lo que desean por la fuerza bruta.
                        </p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <iframe width="100%" height="50%"
                                src="https://www.youtube.com/embed/tLOsf9wbs-8?autoplay=0"></iframe>

                    </div>
                </div>
            </div>


        </main>
    </div>


@endsection