<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Portafolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Photographer;

class PhotographerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photographers = User::where('type', 'Fotografo')->paginate(5);
        return view('fotografos.index', compact('photographers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organizador = auth()->user()->id;
        $eventos = Evento::where('organizer_id', $organizador)->get();
        $fotografo = User::find($id);
        $files = Portafolio::where('fotografo_id', $fotografo->id)->get();
        return view('fotografos.show', compact('files', 'fotografo', 'eventos'));
    }
}
