<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Catalogo;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop($catalogo_id)
    {
        $catalogo = Catalogo::find($catalogo_id);
        $photos = Foto::where('catalogo_id', $catalogo_id)->get();
        
        return view('shop', compact('photos', 'catalogo'));
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request)
    {
        \Cart::add(
            array(
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->img,
                    'slug' => $request->slug
                )
            )
        );

        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear()
    {
        \Cart::clear();
        
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }
}