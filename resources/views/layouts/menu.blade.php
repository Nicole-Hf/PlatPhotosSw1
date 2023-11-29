<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    @can('ver-rol')
    <a class="nav-link" href="/">
        <i class=" fas fa-home"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan
    @can('ver-evento')
    <a class="nav-link" href="/organizador/home">
        <i class=" fas fa-home"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="/eventos">
        <i class=" fas fa-building"></i><span>Ver Eventos</span>
    </a>
    <a class="nav-link" href="/fotografos">
        <i class=" fas fa-camera"></i><span>Ver Fotógrafos</span>
    </a>
    @endcan
</li>
