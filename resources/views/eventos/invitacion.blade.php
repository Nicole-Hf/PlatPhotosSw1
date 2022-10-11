@extends('layouts.app2')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ $evento->title }}</h3>
        </div>
        <div class="section-body">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset($evento->code_qr) }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Fecha del Evento</h5>
                                        <p class="card-text">{{ $evento->create_date }}</p>
                                        <h5 class="card-title">Hora del Evento</h5>
                                        <p class="card-text">{{ $evento->create_time }}</p>
                                        <h5 class="card-title">Lugar/Dirección</h5>
                                        <p class="card-text">{{ $evento->address }}</p>
                                        <h5 class="card-title">Detalles Adicionales</h5>
                                        <p class="card-text">{{ $evento->description }}</p>
                                        <h5 class="card-title">Organizado por:</h5>
                                        <p class="card-text">{{ $evento->organizer->name }}</p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="{{ route('eventos.download', $evento->id)}}" class="btn btn-primary">Descargar Qr</a>
                                                @can('crear-compra')
                                                <a href="{{ route('catalogos.invitados', $evento->catalogo->id)}}" class="btn btn-primary">Ver Catálogo</a>
                                                @endcan
                                                @can('crear-catalogo')
                                                <form action="{{ route('invitaciones.changeStatus', $evento->id) }}" method="POST" style="display: inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                                </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
