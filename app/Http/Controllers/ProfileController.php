<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitado = auth()->user()->id;
        $files = Perfil::where('invitado_id', $invitado)->get();
        return view('invitados.upload', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invitados.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'path' => 'required|image'
        ]);

        $invitado = auth()->user();

        $nombre = Str::random(10) . $request->file('path')->getClientOriginalName();
        $ruta = storage_path() . '/app/public/invitados/' . $nombre;
        Image::make($request->file('path'))
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($ruta);

        $perfil = Perfil::create([
            'path' => '/storage/invitados/' . $nombre,
            'invitado_id' => $invitado->id
        ]);

        $client = new Client();
        $headers = ['token' => '2c7e95ae8d1549ba9fdfa0bb5a5fe86b'];
        $options = [
            'multipart' => [
                [
                  'name' => 'name',
                  'contents' => $invitado->name,
                ],
                [
                  'name' => 'photo',
                  'contents' => $perfil->path,
                  'filename' => $perfil->path,
                  'headers'  => [
                    'Content-Type' => '<Content-type header>'
                  ]
                ],
                [
                  'name' => 'store',
                  'contents' => '1'
                ]
            ]
        ];
        $request = new Psr7Request('POST', 'https://api.luxand.cloud/subject/v2', $headers);
        $res = $client->sendAsync($request, $options)->wait();
        echo $res->getBody();

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
