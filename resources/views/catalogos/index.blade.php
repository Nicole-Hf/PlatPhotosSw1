@extends('layouts.app2')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"></h3>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row">
                    @foreach ($invitaciones as $invitacion)
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $invitacion->evento->title }}</h5>
                                <p class="card-text">{{ $invitacion->evento->create_date }}</p>
                                <a href="{{ route('catalogos.photos', $invitacion->evento->catalogo->id) }}" class="btn btn-primary">Ir al catálogo</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
