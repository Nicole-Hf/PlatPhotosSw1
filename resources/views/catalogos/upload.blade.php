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
                            <form action="{{route('catalogos.store', $catalogo->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="price" type="number"
                                               class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                               name="price"
                                               tabindex="1" placeholder="Precio de la fotografía" value="{{ old('price') }}"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="file" name="path" id="" accept="image/*">
                                        <br>
                                        @error('path')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Subir Foto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($photos as $photo)
                                    <div class="col-4">
                                        <div class="card border-dark mb-3">
                                            <img src="{{asset($photo->image)}}" alt="">
                                            <div class="card-footer">
                                                <form class="form-inline" action="{{route('galleries.destroy', $photo)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <div class="col-md-4">
                                                        <h6>Bs.- {{ $photo->price }}</h6>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger btn-center">Eliminar</button>
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
