@extends('layouts.app2')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container" style="height: auto;">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                                        <a href="{{ route('profiles.create') }}" class="btn btn-warning">
                                            Actualiza tu perfil con fotografías
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($eventos as $evento)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evento->title }}</h5>
                            <p class="card-text">{{ $evento->create_date }} - {{ $evento->create_time }}</p>
                            <a href="{{ route('catalogos.invitados', $evento->catalogo->id)}}" class="btn btn-primary">Ver Catálogo</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
