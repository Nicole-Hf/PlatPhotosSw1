<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;
use App\Models\Evento;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        $eventos = Evento::paginate(5);
        return view('eventos.indexAdmin', compact('eventos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizador = auth()->user()->id;
        $eventos = Evento::where('organizer_id', $organizador)->get();
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'address' => 'required',
            'create_date' => 'required',
            'create_time' => 'required',
        ]);

        $organizador = auth()->user()->id;

        $evento = new Evento();
        $evento->title = $request->input('title');
        $evento->address = $request->input('address');
        $evento->description = $request->input('description');
        $evento->create_date = $request->input('create_date');
        $evento->create_time = $request->input('create_time');
        $evento->organizer_id = $organizador;
        $evento->save();

        $imagen = Str::slug($evento->title).'.png';
        $filename = storage_path(). '/app/public/codesqr/' .$imagen;
        $name = substr($filename, 43);
        $route = route('eventos.invitation', $evento->id);

        QrCode::size(400)->format('png')->generate($route, $filename);
        $url = Storage::url($name);
        $evento->code_qr = $url;
        $evento->save();

        Catalogo::create([
            'title' => $evento->title,
            'evento_id' => $evento->id,
        ]);

        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('eventos.mostrar', compact('evento'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invitation($id)
    {
        $evento = Evento::find($id);
        return view('eventos.invitacion', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('eventos.editar', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        request()->validate([
            'address' => 'required',
        ]);

        $organizador = auth()->user()->id;

        $evento->update([
            'title' => $request->title,
            'address' => $request->address,
            'description' => $request->description,
            'create_date' => $request->create_date,
            'create_time' => $request->create_time,
            'organizer_id' => $organizador,
        ]);

        $url = str_replace('storage', 'public', $evento->code_qr);
        Storage::delete($url);

        $imagen = Str::slug($evento->title).'.png';
        $filename = storage_path(). '/app/public/codesqr/' .$imagen;
        $name = substr($filename, 41);
        $route = route('eventos.invitation', $evento->id);

        QrCode::size(400)->format('png')->generate($route, $filename);
        $path = Storage::url($name);
        $evento->code_qr = $path;
        $evento->save();

        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index');
    }
}
