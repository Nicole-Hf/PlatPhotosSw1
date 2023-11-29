@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col-md-8">
                <h3 class="page__heading">{{ $fotografo->name }}</h3>
            </div>
            <div class="col-md-6">
                <form action="{{ route('invitaciones.store', $fotografo->id) }}" method="POST" style="display: inline">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <select name="evento_id" id="inputevento_id" class="form-control">
                                <option value="">-- Seleccione un Evento --</option>
                                @foreach($eventos as $evento)
                                <option value="{{ $evento->id }}">
                                    {{ $evento->title }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('evento_id'))
                            <span class="error text-danger" for="input-evento_id">
                                {{ $errors->first('evento_id') }}
                            </span>
                            @endif
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Contratar</button>
                        </div>
                    </div>
                </form>
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
