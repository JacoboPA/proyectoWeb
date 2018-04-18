@extends('master')
@section('title', 'historia')
@section('content')
    <style>

        #contenido_historia {
            color: white;
            padding-bottom: 3vh;
        }

        .logo_clase img {
            padding: 3vh;
        }

        #contenido_historia p {
            padding: 5vh;
        }
        #contenido_historia img{
            padding-left: 5vh;
        }
    </style>
    <div class="container col-md-8 col-md-offset-2">
        <main>
            <div class="row" id="historia">
                <div class="col-md-5 panel animated fadeInDown">
                    <h2>La historia de Mordheim</h2>
                </div>
                <div class="col-md-12  logo_clase">
                    <img src="/imagenes/intro_historia.jpg" width="100%" height="50%" class="animated fadeIn">
                </div>
            </div>

            <div class="row" id="contenido_historia">

                <div id="contenido_historia_texto" class="row">
                    <div class="col-md-10">
                        <p>
                            Esta es una época oscura, una época de demonios y de brujería. Es una época de batallas y
                            muerte, y del fin del mundo. En medio de todo el fuego, las llamas y la furia, también es
                            una
                            época de poderosos héroes, de osadas hazañas y de grandiosa valentía.
                        </p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            En el corazón del Viejo Mundo se extiende el Imperio, el más grande y poderoso de todos los
                            reinos humanos. Conocido por sus ingenieros, hechiceros, comerciantes y soldados, es un
                            territorio de grandes montañas, caudalosos ríos, oscuros bosques y enormes ciudades. Y desde
                            su trono de Altdorf reina el emperador Karl Franz, sagrado descendiente del fundador de
                            estos territorios, Sigmar, portador del martillo de guerra mágico Ghal Maraz.
                        </p>

                        <p>
                            <button class="btn btn-success enlace">Mapa del Imperio</button>
                            <div class="mas " style="display: none;">
                            <img src="/imagenes/imperio.jpg" width="100%" height="50%">
                             </div>
                        </p>

                    </div>
                </div>

            </div>


        </main>
    </div>
@endsection