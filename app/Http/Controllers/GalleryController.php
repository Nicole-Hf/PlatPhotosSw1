<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muestra;
use App\Models\Photographer;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotografo = auth()->user()->id;
        $files = Muestra::where('fotografo_id', $fotografo)->get();
        return view('fotografos.dashboard', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fotografos.dashboard');
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
            'image' => 'required|image|max:2048'
        ]);

        $fotografo = auth()->user()->id;

        $images = $request->file('image')->store('public');
        $url = Storage::url($images);

        Muestra::create([
            'title' => $request->title,
            'path' => $url,
            'fotografo_id' => $fotografo
        ]);

        return redirect()->route('galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($file)
    {
        $file = Muestra::where('id', $file)->first();
        $url = str_replace('storage', 'public', $file->path);
        Storage::delete($url);

        $file->delete();
        return redirect()->route('galleries.index');
    }
}
