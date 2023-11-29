@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('process.checkout') }}">
                        @csrf

                        <!-- Campos de información de envío -->
                        <div class="form-group">
                            <label for="phone">{{ __('Celular') }}</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>

                        <!-- Métodos de envío -->
                        <div class="form-group">
                            <label for="shipping_method">{{ __('Método de Envío') }}</label>
                            <select id="shipping_method" name="shipping_method" class="form-control" required>
                                <option value="standard">{{ __('Envío Físico') }}</option>
                                <option value="express">{{ __('Envío Digital') }}</option>
                            </select>
                        </div>

                        <!-- Métodos de pago -->
                        <div class="form-group">
                            <label for="payment_method">{{ __('Método de Pago') }}</label>
                            <select id="payment_method" name="payment_method" class="form-control" required>
                                <option value="contra_entrega">{{ __('Pago contra entrega') }}</option>
                                <option value="transferencia">{{ __('Transferencia bancaria') }}</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Procesar Pago') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
