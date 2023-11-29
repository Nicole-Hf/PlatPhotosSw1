@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ $evento->title }}</h3>
        </div>
        <div class="section-body">
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
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="/fotografos" class="btn btn-primary">Contratar Fotografos</a>
                                            <a href="{{ route('eventos.invitados', $evento->id)}}" class="btn btn-primary">Lista de Invitados</a>
                                            <a href="{{ route('eventos.download', $evento->id)}}" class="btn btn-primary">Descargar Qr</a>
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
