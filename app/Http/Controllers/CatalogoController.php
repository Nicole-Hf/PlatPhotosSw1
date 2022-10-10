<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Evento;
use App\Models\Foto;
use App\Models\Invitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotografo_id = auth()->user()->id;
        $invitaciones = Invitacion::where([
            'fotografo_id' => $fotografo_id,
            'estado' => 'Aceptado',
        ])->get();

        return view('catalogos.index', compact('invitaciones'));
    }

    /**
     * Display a listing of the photos.
     *
     * @return \Illuminate\Http\Response
     */
    public function photos($catalogo_id)
    {
        $catalogo = Catalogo::find($catalogo_id);
        $fotografo = auth()->user()->id;
        $photos = Foto::where([
            'fotografo_id' => $fotografo,
            'catalogo_id' => $catalogo->id
        ])->get();

        return view('catalogos.upload', compact('photos', 'catalogo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $catalogo_id)
    {
        $catalogo = Catalogo::find($catalogo_id);
        $request->validate([
            'path' => 'required|image',
            'price' => 'required'
        ]);

        $fotografo = auth()->user()->id;
        /*$images = $request->file('path')->store('public');
        $url = Storage::url($images);

        Foto::create([
            'price' => $request->price,
            'path' => $url,
            'fotografo_id' => $fotografo,
            'catalogo_id' => $catalogo->id
        ]);*/

        $nombre = Str::random(10) . $request->file('path')->getClientOriginalName();
        $ruta = storage_path() . '/app/public/eventos/' . $nombre;
        $img = Image::make($request->file('path'))
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->insert(public_path('watermark.png', 'center', 10, 10))->save($ruta);

        Foto::create([
            'price' => $request->price,
            'path' => '/storage/eventos/' . $nombre,
            'fotografo_id' => $fotografo,
            'catalogo_id' => $catalogo->id
        ]);

        return redirect()->route('catalogos.photos', $catalogo_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($evento_id)
    {
        $evento = Evento::find($evento_id);
        $catalogo = Catalogo::where('evento_id', $evento->id)->first();

        return view('catalogos.upload', compact('catalogo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($photo)
    {
        $file = Foto::where('id', $photo)->first();
        $url = str_replace('storage', 'public', $photo->path);
        Storage::delete($url);

        $file->delete();
        return redirect()->route('catalogos.photos');
    }
}
