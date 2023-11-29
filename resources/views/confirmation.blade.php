@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirmación de Orden') }}</div>

                    <div class="card-body">
                        <h3>{{ __('¡Gracias por tu compra!') }}</h3>
                        <p>{{ __('Tu orden ha sido procesada exitosamente.') }}</p>
                        <p>{{ __('Número de Orden:') }} {{ $order->id }}</p>
                        <p>{{ __('Total de la Orden:') }} {{ $order->total }}</p>
                        <p>{{ __('Método de Pago:') }} {{ $order->transaction->paymentMethod }}</p>
                        <p>{{ __('Método de Envío:') }} {{ $order->transaction->shippingMethod }}</p>
                        <p>{{ __('Teléfono:') }} {{ $order->transaction->phone }}</p>
                        <p>{{ __('Fecha de Compra:') }} {{ $order->transaction->paymentDate }}</p>

                        <h4>{{ __('Detalles de la Orden') }}</h4>
                        <ul>
                            @foreach ($order->orderDetails as $detail)
                                <li>{{ $detail->slug }} - {{ $detail->quantity }} x {{ $detail->subtotal }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
