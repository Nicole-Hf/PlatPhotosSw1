@extends('layouts.app2')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ $catalogo->title }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($photos as $photo)
                                    <div class="col-4">
                                        <div class="card border-dark mb-3">
                                            <img src="{{asset($photo->image)}}" alt="">
                                            <div class="card-footer">
                                                <form class="form-inline" action="#" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <div class="col-md-4">
                                                        <h6>Bs.- {{ $photo->price }}</h6>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger btn-center">Comprar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
