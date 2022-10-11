<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-12">
        @can('subir-fotos')
        <li><a href="{{route('home.fotografo')}}" class="nav-link nav-link-lg"><span>Mis Fotos</span></a></li>
        <li><a href="{{route('catalogos.index')}}" class="nav-link nav-link-lg"><span>Eventos</span></a></li>
        <li><a href="{{route('watch_all_notifications')}}" class="nav-link nav-link-lg"><span>Notificaciones</span></a></li>
        @endcan
        @can('crear-compra')
        <li><a href="{{route('home.invitado')}}" class="nav-link nav-link-lg"><span>Ver Eventos</span></a></li>
        <li><a href="{{route('home.fotografo')}}" class="nav-link nav-link-lg"><span>Ver Seleccionadas</span></a></li>
        <li><a href="{{route('catalogos.index')}}" class="nav-link nav-link-lg"><span>Descargar</span></a></li>
        @endcan
    </ul>
</form>
<ul class="navbar-nav navbar-right">
    @if(\Illuminate\Support\Facades\Auth::user())
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                <i class="fas fa-bell mx-0"></i>
                <span class="count">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @foreach (auth()->user()->unreadNotifications as $notification)
                <a class="dropdown-item" href="{{ route('mark_a_notification', [$notification->id, $notification->data['evento_id']]) }}">
                    Nuevo evento - {{ $notification->data['title'] }}
                </a>
                @endforeach
                <a class="dropdown-item" href="{{route('watch_all_notifications')}}">
                    Ver todas
                </a>
            </div>
        </li>

        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/logo.png') }}"
                     class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                <div class="d-sm-none d-lg-inline-block">
                    Hola, {{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    Bienvenido, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                    <i class="fa fa-user"></i>Editar Perfil</a>
                <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i
                            class="fa fa-lock"> </i>Cambiar Contraseña</a>
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    @else
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{--                <img alt="image" src="#" class="rounded-circle mr-1">--}}
                <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ __('messages.common.login') }}
                    / {{ __('messages.common.register') }}</div>
                <a href="{{ route('login') }}" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item has-icon">
                    <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
                </a>
            </div>
        </li>
    @endif
</ul>
