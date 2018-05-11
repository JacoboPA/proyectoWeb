<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PJformRequest;
use App\Personaje;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;//utiliza la clase Mail para que se pueda utilizar la clase Mail.
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
        $personajes = Personaje::all();//aqui hace una especie de consulta para que nos guarde en $personajes , todos los personajes que hay
        // si quisieramos SOLO los de un usuario , sería
        /*
         * $user = Auth::user();
         * $personajes_user = Personaje::where('name',$user->name);
         */
        return view('personajes.index',compact('personajes'));
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
        return view('personajes.index_admin',compact('personajes'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


//Modo de uso
    public function store(PJformRequest $request)
    {
       // $historia=$request->get('historia');
        //$historia_formato=nl2br($historia);
        $user = Auth::user();
        $ticket = new Personaje(array(
            'clase' => $request->get('clase'),
            'raza' => $request->get('raza'),
            'nombre' => $request->get('nombre'),
            'historia' => $request->get('historia'),
            'imagen' =>$request->get('imagen'),
            'name' =>$user->name,
        ));
        $ticket->save();

/*
        Mail::send('personajes.welcome',$data,function ($message){ //carpeta personajes , archivo welcome.blade.php
            $message->from('jacobopa58@gmail.com','Curso laravel');

            $message->to('jacobopa58@gmail.com')->subject('¡hay un nuevo ticket!');
        });
*/
        return redirect('/contact')->with('status', $ticket->nombre.' creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pj = Personaje::wherenombre($slug)->firstOrFail();
        return view('personajes.show',compact('pj'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personaje = Personaje::wherenombre($id)->firstOrFail();
        return view('personajes.edit',compact('personaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($slug, PJformRequest $request)
    {
        //función para poder actualizar la información de un ticket
        $ticket = Personaje::wherenombre($slug)->firstOrFail();
        //almacenamos en $ticket el ticket con el $slug pedido
        $ticket->nombre = $request->get('nombre');
        $ticket->historia = $request->get('historia');
        $ticket->imagen = $request->get('imagen');

        $ticket->save();
        return redirect('/personajes')->with('status','personaje actualizado');
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
        $personaje->delete();
        return redirect('/personajes')->with('status', $slug.' borrado');
        //return view('personajes.index')->with('status','personaje '.$slug.' ha sido borrado');
    }
    public function destroy_admin($slug)
    {
        $personaje = Personaje::wherenombre($slug)->firstOrFail();
        $personaje->delete();
        return redirect('/personajes/admin')->with('status', $slug.' borrado');
        //return view('personajes.index')->with('status','personaje '.$slug.' ha sido borrado');
    }

    public function delete_all()
    {
        $personajes = Personaje::all();
        $personajes->delete();
        return view('personajes.index',compact('personajes'));
    }
}
