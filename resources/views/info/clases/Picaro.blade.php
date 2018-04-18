@extends('master')
@section('title', 'Picaro')
@section('content')

    <style>

        #contenido_picaro {
            color: white;
            padding-bottom: 3vh;
        }

        .logo_clase img {
            padding-top: 3vh;
        }
        #contenido_picaro p{
            padding: 5vh 5vh 2vh 5vh;

        }
    </style>
    <div class="container col-md-8 col-md-offset-2">
        <main>
            <div class="row" id="Enanos">
                <div class="col-md-5 panel animated fadeInDown">
                    <h2>Pícaro</h2>
                </div>
                <div class="col-md-5 col-md-push-3 logo_clase">
                    <img src="/imagenes/Rogue.png" width="50%" class="animated rubberBand">
                </div>
            </div>

            <div class="row" id="contenido_picaro">
                <div class="row">
                    <div class="col-md-6">
                        <p >
                            Entre ellos, los pícaros tienen poco en común. Algunos son sigilosos ladrones; otros, embusteros
                            con pico de oro; y aún otros son infiltrados, espías, diplomáticos o matones. Lo único que
                            tienen en común es que son polifacéticos, además de poseer un gran ingenio y mucha capacidad de
                            adaptación. Por lo general, a los pícaros se les da bien conseguir aquello que los demás no
                            desean que consigan: entrar en una sala del tesoro cerrada con llave, salvar una mortífera
                            trampa sin correr peligro, obtener los planes secretos para una batalla, ganarse la confianza de
                            un guardia o hacerse con el dinero que haya en el bolsillo de una persona al azar.
                        </p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            <strong>Aventuras:</strong> los pícaros se van de aventuras por la misma razón que les impulsa a
                            hacer la mayoría
                            de las cosas: conseguir aquello que pueden conseguir. Algunos buscan botín, pero otros prefieren
                            adquirir experiencia. Unos desean hacerse famosos y otros adquirir mala fama. Además, a muchos
                            de ellos les gustan los desafíos. Imaginarse cómo desbaratar una trampa o evitar una alarma
                            suele resultar divertido para la mayoría de los pícaros.
                        </p>
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-8">
                       <p>
                           <strong>Peculiaridades:</strong> los pícaros son muy diestros y tienen muchos tipos de
                           habilidades en las cuales
                           concentrarse. Aunque en combate no pueden igualar a los de muchas otras clases, los pícaros
                           saben golpear donde más duele y pueden infligir mucho daño a sus oponentes cuando logran un
                           ataque furtivo.
                       </p>
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p >
                            Poseen un sexto sentido en lo que se refiere a evitar el peligro. A medida que dominan las artes
                            del sigilo, la evasión y los ataques furtivos, los pícaros experimentados desarrollan unas
                            habilidades y poderes de naturaleza casi mágica. Además, aunque no pueden ejecutar sortilegios
                            de por sí, pueden "hacerse pasar" lo bastante bien por lanzadores de conjuros como para
                            ejecutarlos usando rollos de pergamino, activar varitas y usar prácticamente cualquier otro
                            objeto mágico.
                        </p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <iframe width="100%" height="50%" src="https://www.youtube.com/embed/58S_37bGXZk?autoplay=0"></iframe>

                    </div>
                </div>
            </div>


        </main>
    </div>

@endsection