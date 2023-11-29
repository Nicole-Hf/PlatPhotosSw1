@extends('layouts.app2')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"></h3>
        </div>
        <div class="section-body">
            <div class="container" style="height: auto;">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('profiles.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="file" name="path" id="" accept="image/*">
                                                    <br>
                                                    @error('path')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-primary">Subir Imagen</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($files as $file)
                                                <div class="col-4">
                                                    <div class="card border-dark mb-3">
                                                        <img src="{{ asset($file->path) }}" alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
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

