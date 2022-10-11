@extends('layouts.app2')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ $catalogo->title }}</h3>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 bg-light">
                        @if (count(Cart::getContent()))
                            <a href="{{ route('cart.checkout') }}"> VER CARRITO <span
                                    class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
                        @endif
                    </div>
                    <div class="col-sm-9">
                        <div class="row  justify-content-center">
                            @forelse ($photos as $item)
                            <div class="col-4">
                                <div class="card border-dark mb-3">
                                    <img src="{{asset($item->path)}}" alt="">
                                    <P>$ {{ $item->price }}</P>
                                    <div class="card-footer">
                                        <form action="{{ route('cart.add') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $item->id }}">
                                            <input type="submit" name="btn" class="btn btn-success" value="ADD TO CART">
                                        </form>
                                    </div>
                                </div>
                            </div>
                                {{--<div class="col-4 border p-5 mt-5 text-center">
                                    <h1>{{ $item->path }}</h1>
                                    <P>$ {{ $item->price }}</P>
                                    <form action="{{ route('cart.add') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $item->id }}">
                                        <input type="submit" name="btn" class="btn btn-success" value="ADD TO CART">
                                    </form>
                                </div>--}}
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
