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
                                        <span class="badge rounded-pill bg-success text-white">
                                            <a href="{{ route('profiles.create')}}">Actualiza tu perfil para mejorar la atención</a>
                                        </span>
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
