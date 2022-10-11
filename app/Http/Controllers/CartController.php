<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
//use Cart;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{

    public function add(Request $request){

        $producto = Foto::find($request->producto_id);

        Cart::add(
            $producto->id,
            $producto->price,
            1,
            array("urlfoto"=>$producto->path)

        );
        return back()->with('success',"¡se ha agregado con éxito al carrito!");

    }

    public function cart(){

        return view('checkout');
    }

    public function removeitem(Request $request) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }

}
