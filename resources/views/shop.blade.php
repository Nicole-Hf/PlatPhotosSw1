@extends('layouts.app2')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ $catalogo->title }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                @foreach ($products as $pro)
                    <div class="col-lg-3 ml-4">
                        <div class="card" style="margin-bottom: 20px; height: auto;">
                            <img src="{{ asset($pro->image) }}" class="card-img-top mx-auto"
                                style="height: 150px; width: 150px;display: block; margin-top:8px;"
                                alt="{{ $pro->image }}">
                            <div class="card-body">
                                {{-- <a href="">
                                    <h6 class="card-title">{{ $pro->name }}</h6>
                                </a> --}}
                                <p>Precio: Bs.- {{ $pro->price }}</p>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                    <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                    <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                    <input type="hidden" value="{{ $pro->image }}" id="img" name="img">
                                    <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                    <div class="row">
                                        <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                            <i class="fa fa-shopping-cart"></i> Agregar al carrito
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
