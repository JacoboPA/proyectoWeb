<?php

namespace App\Http\Controllers;


use Faker\Provider\File;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\PJformRequest;
use App\Personaje;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

//utiliza la clase Mail para que se pueda utilizar la clase Mail.
//aquí se incluye el modelo de Personaje.
class PJController extends Controller
{
    /**
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
        $ticket = new Personaje(array(
            'clase' => $request->get('clase'),
            'raza' => $request->get('raza'),
            'nombre' => $request->get('nombre'),
            'historia' => $request->get('historia'),
            'imagen' => $imagen,
            'name' => $user->name,
        ));
        $ticket->save();

        //Personaje::create($request->all());


        /*
                Mail::send('personajes.welcome',$data,function ($message){ //carpeta personajes , archivo welcome.blade.php
                    $message->from('jacobopa58@gmail.com','Curso laravel');

                    $message->to('jacobopa58@gmail.com')->subject('¡hay un nuevo ticket!');
                });
        */
        return redirect('/contact')->with('status', $ticket->nombre . ' creado.');
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
    public function update($slug, PJformRequest $request)
    {


        $user = Auth::user();
        //función para poder actualizar la información de un ticket
        $ticket = Personaje::wherenombre($slug)->firstOrFail();
        if ($request->get('imagen') == '' && $request->file('archivo') != null) {
            $imagen = $request->file('archivo')->storeAs('/' . $user->name, $request->get('nombre') . '.' . $request->file('archivo')->getClientOriginalExtension());
        } else {
            $imagen = $request->get('imagen');

        }

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
            $pj->delete();
        }
        return redirect('/personajes')->with('status', 'se han borrado todos los personajes');
    }

    public function cargar_archivos()
    {
        $ip_usuario = $_SERVER['REMOTE_ADDR'];//Con esta línea capturamos la dirección ip del usuario.

        $conexion = mysqli_connect("127.0.0.1", "homestead", "secret", "homestead");
        $usuario = $_GET['nombre'];
        $consulta = $conexion->query("select name from users where name='" . $usuario . "'");
        if ($_GET['nombre'] == "") {
            echo "";
        } else {
            if ($consulta->num_rows > 0) {
                echo "no disponible";
            } else {
                echo "disponible";
            }

        }
    }


    public function updatePhoto(Request $request)
    {
        $user = Auth::user();
        //$personaje = Personaje::wherenombre($slug)->firstOrFail();
        $this->validate($request, [
            'photo' => 'required|image'
        ]);
        $file = $request->file('photo');

        $imagen = $request->file('photo')->storeAs('/' . $user->name, $request->get('nombre') . $request->file('photo')->getATime()%100 .'.' . $request->file('photo')->getClientOriginalExtension());

        //$imagen = $file->storeAs('cambios/'.$user->name, $user->name .'_'. $request->file('photo')->getATime()%1000 . '.' . $request->file('photo')->getClientOriginalExtension());

        return $imagen;
    }
}
