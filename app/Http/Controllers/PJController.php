<?php

namespace App\Http\Controllers;


use Faker\Provider\File;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\PJformRequest;
use App\Personaje;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

//utiliza la clase Mail para que se pueda utilizar la clase Mail.
//aquí se incluye el modelo de Personaje.
class PJController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$personajes = Personaje::all();//aqui hace una especie de consulta para que nos guarde en $personajes , todos los personajes que hay

        $personajes = Personaje::paginate(3);

        // si quisieramos SOLO los de un usuario , sería
        /*
         * $user = Auth::user();
         * $personajes_user = Personaje::where('name',$user->name);
         */
        return view('personajes.index', compact('personajes'));
        //hace referencia a personajes.index , el cual existe en personajes
    }

    public function index_admin()
    {
        $personajes = Personaje::all();//aqui hace una especie de consulta para que nos guarde en $personajes , todos los personajes que hay
        // si quisieramos SOLO los de un usuario , sería
        /*
         * $user = Auth::user();
         * $personajes_user = Personaje::where('name',$user->name);
         */
        return view('personajes.index_admin', compact('personajes'));
        //hace referencia a personajes.index , el cual existe en personajes
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personajes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


//Modo de uso
    public function store(PJformRequest $request)
    {
        // $historia=$request->get('historia');
        //$historia_formato=nl2br($historia);
        $user = Auth::user();


        if ($request->get('imagen') == '' && $request->file('archivo') != null) {
            $imagen = $request->file('archivo')->storeAs('/' . $user->name, $request->get('nombre') . '.' . $request->file('archivo')->getClientOriginalExtension());
        } else {
            $imagen = $request->get('imagen');

        }


        if($request->get('raza') != 'Elfo' || 'Humano' || 'Enano'){
            $raza = 'default';
        }
        elseif ($request->get('clase') != 'Guerrero' || 'Picaro' || 'Mago'){
            $clase = 'default';
        }
        else{
            $raza = $request->get('raza');
            $clase = $request->get('clase');
            $ticket = new Personaje(array(
                'clase' => $clase,
                'raza' => $raza,
                'nombre' => $request->get('nombre'),
                'historia' => $request->get('historia'),
                'imagen' => $imagen,
                'name' => $user->name,
            ));
            $ticket->save();
        }



        //Personaje::create($request->all());


        /*
                Mail::send('personajes.welcome',$data,function ($message){ //carpeta personajes , archivo welcome.blade.php
                    $message->from('jacobopa58@gmail.com','Curso laravel');

                    $message->to('jacobopa58@gmail.com')->subject('¡hay un nuevo ticket!');
                });
        */
        return redirect('/personajes')->with('status', $ticket->nombre . ' creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pj = Personaje::wherenombre($slug)->firstOrFail();
        return view('personajes.show', compact('pj'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personaje = Personaje::wherenombre($id)->firstOrFail();
        return view('personajes.edit', compact('personaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function rename(Request $request)
    {
        $user = Auth::user();

        $nombre_antiguo = $request->get('nombre_antiguo');
        $nombre_nuevo = $request->get('nombre');

        if ($request->file('archivo') != null) {
            Storage::delete($user->name . '/' . $nombre_antiguo . '_new.JPG');
        }

        Storage::move($user->name . '/' . $nombre_antiguo . '.jpg', $user->name . '/' . $nombre_nuevo . '.jpg');
    }

    public function update($slug, PJformRequest $request)
    {


        $user = Auth::user();
        //función para poder actualizar la información de un ticket
        $ticket = Personaje::wherenombre($slug)->firstOrFail();
        if ($request->file('archivo') != null) {
            $imagen = $request->file('archivo')->storeAs('/' . $user->name, $request->get('nombre') . '.' . $request->file('archivo')->getClientOriginalExtension());
            Storage::delete($user->name . '/' . $request->get('nombre') . '_new.' . $request->file('archivo')->getClientOriginalExtension());
        } else {
            $imagen = $request->get('imagen');


        }
        /**
         * Modificar para que busque todos los personajes existentes y en el momento en el que haya imagenes
         * que no se correspondan con el nombre de ningún personaje , las borra.
         */


        //almacenamos en $ticket el ticket con el $slug pedido
        $ticket->nombre = $request->get('nombre');
        $ticket->historia = $request->get('historia');
        $ticket->imagen = $imagen;
        $ticket->save();


        return redirect('/personajes')->with('status', 'personaje actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $personaje = Personaje::wherenombre($slug)->firstOrFail();
        Storage::delete($personaje->getImagen());
        $personaje->delete();
        return redirect('/personajes')->with('status', $slug . ' borrado');
        //return view('personajes.index')->with('status','personaje '.$slug.' ha sido borrado');
    }

    public function destroy_admin($slug)
    {
        $personaje = Personaje::wherenombre($slug)->firstOrFail();
        $personaje->delete();
        Storage::disk('local')->delete('avatares/' . $personaje->getImagen());
        return redirect('/personajes/admin')->with('status', $slug . ' borrado');
        //return view('personajes.index')->with('status','personaje '.$slug.' ha sido borrado');
    }


    public function delete_all()
    {
        $personajes = Personaje::all();
        foreach ($personajes as $pj) {
            Storage::delete($pj->getImagen());
            $pj->delete();

        }
        return redirect('/personajes')->with('status', 'se han borrado todos los personajes');
    }

    public function cargar_archivos()
    {

        $usuario = $_GET['nombre'];

        $usuarios = User::all();
        $contador = 0;
        foreach ($usuarios as $user) {
            if ($user->name == $usuario) {
                $contador++;
            }
        }
        if ($_GET['nombre'] == "") {
            echo "";
        } else {
            if ($contador > 0) {
                echo "No Disponible";
            } else {
                echo "Disponible";
            }

        }
    }

    public function print($nombre)
    {
        $pj = Personaje::wherenombre($nombre)->firstOrFail();


        $pdf = PDF::loadView('PDFs.personaje', compact('pj'));

        return $pdf->download($nombre.'.pdf');

    }

    public function updatePhoto(Request $request)
    {
        $user = Auth::user();
        //$personaje = Personaje::wherenombre($slug)->firstOrFail();
        $this->validate($request, [
            'photo' => 'required|image'
        ]);
        //$file = $request->file('photo');

        $imagen = $request->file('photo')->storeAs('/' . $user->name, $request->get('nombre') . '_new.' . $request->file('photo')->getClientOriginalExtension());

        //$imagen = $file->storeAs('cambios/'.$user->name, $user->name .'_'. $request->file('photo')->getATime()%1000 . '.' . $request->file('photo')->getClientOriginalExtension());

        return $imagen;
    }
}
