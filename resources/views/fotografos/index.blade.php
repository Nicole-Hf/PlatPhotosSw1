@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Fotografos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Email</th>
                                    <th style="color: #fff">Telefono/Celular</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($photographers as $photographer)
                                        <tr>
                                            <td style="display: none">{{$photographer->id}}</td>
                                            <td>{{$photographer->name}}</td>
                                            <td>{{$photographer->email}}</td>
                                            <td>{{$photographer->phone}}</td>
                                            <td>
                                                @can('borrar-user')
                                                <a class="btn btn-success" href="#">Editar</a>
                                                <a class="btn btn-danger" href="#">Borrar</a>
                                                @endcan
                                                <a class="btn btn-info" href="{{ route('fotografos.show', $photographer->id) }}">Catalago</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $photographers->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

