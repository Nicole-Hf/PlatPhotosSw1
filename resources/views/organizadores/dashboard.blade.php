@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($eventos as $evento)
                        <div class="card text-center">
                            <div class="card-header">
                              {{ $evento->create_date }}
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">{{ $evento->title }}</h5>
                              <p class="card-text">{{ $evento->description }}</p>
                              <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-primary">Ver Evento</a>
                            </div>
                            <div class="card-footer text-muted">
                              {{ $evento->address }}
                            </div>
                          </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
