<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function process(Request $request)
    {
        // Crea la orden en la tabla de órdenes
        $order = Compra::create([
            'invitado_id' => auth()->user()->id,
            // Asigna el ID del usuario autenticado
            'total' => \Cart::getTotal(),
            // Obtiene el total del carrito
            'estado' => 'pending', // Puedes definir el estado inicial de la orden
        ]);

        // Agrega los detalles de la orden en la tabla de order_details
        foreach (\Cart::getContent() as $item) {
            $order->orderDetails()->create([
                'foto_id' => $item->id,
                'quantity' => $item->quantity,
                'subtotal' => $item->price * $item->quantity,
                'compra_id' => $order->id
            ]);
        }

        // Crea una nueva transacción en la tabla de transacciones
        $transaction = Transaccion::create([
            'compra_id' => $order->id,
            'paymentMethod' => $request->payment_method,
            'shippingMethod' => $request->shipping_method,
            'amount' => $order->total,
            'phone' => $request->phone,
            'paymentDate' => now(),
        ]);

        // Limpia el carrito después de completar el proceso de checkout
        \Cart::clear();

        // Ejemplo de redirección a una página de confirmación
        return redirect()->route('order.confirmation', $order->id);
    }

    public function showConfirmation($orderId)
    {
        $order = Transaccion::where(['id' => $orderId, 'paymentDate' => now()])->first();

        return view('confirmation', compact('order'));
    }
}