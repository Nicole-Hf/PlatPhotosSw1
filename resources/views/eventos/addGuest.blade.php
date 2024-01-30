@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Lista de Invitados</h3>
        </div>
        <div class="section-body">
            {{-- Formulario para agregar invitados --}}
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('eventos.storeguest', $evento->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Invitado</button>
                    </form>
                </div>
            </div>

            {{-- Listado de invitados --}}
            <div class="card mt-4">
                <div class="card-body">
                    <h5>Listado de Invitados</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Asistencia</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invitados as $item)
                                <tr>
                                    <td>{{ $item->invitado->name }}</td>
                                    <td>{{ $item->invitado->email }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No hay invitados registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
