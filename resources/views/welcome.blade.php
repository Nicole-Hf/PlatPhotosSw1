@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col-10">
                <h3 class="page__heading">{{ $fotografo->user->name }}</h3>
            </div>
            <div class="col">
                <a class="btn btn-info" href="">Contratar</a>
            </div>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card-columns">
                            @foreach ($files as $file)
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset($file->path) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
