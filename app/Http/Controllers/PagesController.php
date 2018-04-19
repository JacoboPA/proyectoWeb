<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function home()
    {
        return view('homeb');
    }

    public function index()
    {
        return view('index');
    }

    public function settings()
    {
        return view('auth.indexUser');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('personajes.create');
    }


    /*
     * Paginas de clases
     */
    public function Wizard()
    {
        return view('info.clases.Mago');
    }

    public function Rogue()
    {
        return view('info.clases.Picaro');
    }

    public function Warrior()
    {
        return view('info.clases.Guerrero');
    }

    /*
     * Paginas de razas
     */
    public function Elf()
    {
        return view('info.razas.Elfo');
    }

    public function Dwarf()
    {
        return view('info.razas.Enano');
    }

    public function Human()
    {
        return view('info.razas.Humano');
    }
}
