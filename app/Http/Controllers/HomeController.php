<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Muestra;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * public function __construct()
     * {
     * $this->middleware('auth');
     * }
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $files = Muestra::paginate(25);
        return view('index', compact('files'));
    }

    public function homeFotografo() {
        $fotografo = auth()->user()->id;
        $files = Muestra::where('fotografo_id', $fotografo)->get();
        return view('fotografos.dashboard', compact('files'));
    }

    public function homeOrganizador() {
        $organizador = auth()->user()->id;
        $eventos = Evento::where('organizer_id', $organizador)->get();
        return view('organizadores.dashboard', compact('eventos'));
    }

    public function homeInvitado() {
        $organizador = auth()->user()->id;
        //$eventos = Evento::where('organizer_id', $organizador)->get();
        return view('invitados.dashboard');
    }
}
