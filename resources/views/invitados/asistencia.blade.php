@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ $asistencia->evento->title }}</h3>
        </div>
        <div class="section-body">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Invitado:</h5>
                                        <p class="card-text text-center">{{ $asistencia->invitado->name }}</p>
                                        <h5 class="card-title">Fecha del Evento</h5>
                                        <p class="card-text text-center">{{ $asistencia->evento->create_date }}</p>
                                        <h5 class="card-title">Hora del Evento</h5>
                                        <p class="card-text text-center">{{ $asistencia->evento->create_time }}</p>
                                        <h5 class="card-title">Lugar/Dirección</h5>
                                        <p class="card-text text-center">{{ $asistencia->evento->address }}</p>
                                        <h5 class="card-title">Organizado por:</h5>
                                        <p class="card-text text-center">{{ $asistencia->evento->organizer->name }}</p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @can('crear-evento')
                                                    @if (Str::is('pending', $asistencia->status))
                                                        <form
                                                            action="{{ route('invitaciones.markAsistencia', $asistencia->id) }}"
                                                            method="POST" style="display: inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Marcar
                                                                Asistencia</button>
                                                        </form>
                                                    @endif
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
