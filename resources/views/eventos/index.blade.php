@extends('layouts.app')

@section('css')
<style>
    /* Estilos para hacerla responsive y ocultar columnas */
    @media (max-width: 767px) {

        .table th:nth-child(3),
        /* Cambia el número por el índice de la columna que quieras ocultar */
        .table td:nth-child(3) {
            display: none;
        }
        .table th:nth-child(4),
        /* Cambia el número por el índice de la columna que quieras ocultar */
        .table td:nth-child(4) {
            display: none;
        }
        .table th:nth-child(5),
        /* Cambia el número por el índice de la columna que quieras ocultar */
        .table td:nth-child(5) {
            display: none;
        }
        .table th:nth-child(6),
        /* Cambia el número por el índice de la columna que quieras ocultar */
        .table td:nth-child(6) {
            display: none;
        }
    }
</style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Eventos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-evento')
                                <a class="btn btn-warning" href="{{ route('eventos.create') }}">Nuevo</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Tema</th>
                                    <th style="color:#fff;">Dirección</th>
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Hora</th>
                                    <th style="color:#fff;">Código Qr</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($eventos as $evento)
                                        <tr>
                                            <td style="display: none;">{{ $evento->id }}</td>
                                            <td>{{ $evento->title }}</td>
                                            <td>{{ $evento->address }}</td>
                                            <td>{{ $evento->create_date }}</td>
                                            <td>{{ $evento->create_time }}</td>
                                            <td>
                                                <div class="img-container">
                                                    <img style="height: 170px; width: 147px;" src="{{asset($evento->code_qr)}}" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                                                    @can('editar-evento')
                                                        <a class="btn btn-warning"
                                                            href="{{ route('eventos.show', $evento->id) }}">Ver</a>
                                                    @endcan
                                                    @can('editar-evento')
                                                        <a class="btn btn-info"
                                                            href="{{ route('eventos.edit', $evento->id) }}">Editar</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-evento')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginacion a la derecha
                            <div class="pagination justify-content-end">

                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
