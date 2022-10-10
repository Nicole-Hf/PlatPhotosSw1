@extends('layouts.app2')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Notificaciones</h3>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row">
                    @foreach ($user->notifications as $notification)
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-1">
                                <span class="badge bg-warning text-dark">
                                    <i class="fas fa-bell"></i>
                                </span>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <a class="card-title" href="{{ route('mark_a_notification', [$notification->id, $notification->data['evento_id']]) }}">
                                        Nuevo evento - {{ $notification->data['title'] }}
                                    </a>
                                    <p class="card-text">Organizado por {{ $notification->data['name'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
