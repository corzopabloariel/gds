<div class="sidebar-header">
    <h3 class="m-0">Menu</h3>
</div>
<div class="position-relative" style="height: calc(100% - 73px - 38px); overflow-y:auto;">
    <div class="w-100 position-absolute">
        <ul class="list-unstyled components m-0 p-0">
            <li class="">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-home mr-2"></i>Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a  href="{{ route('contenido.edit', ['seccion' => 'home'])}}">Contenido</a>
                    </li>
                    <li>
                        <a href="{{ route('slider.index', ['seccion' => 'home'])}}">Slider</a>
                    </li>
                </ul>
            </li>
            <li>
            <a href="#empresaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-building mr-2"></i>Empresa</a>
                <ul class="collapse list-unstyled" id="empresaSubmenu">
                    <li>
                        <a href="{{ route('contenido.edit', ['seccion' => 'empresa'])}}">Contenido</a>
                    </li>
                    <li>
                        <a href="{{ route('slider.index', ['seccion' => 'empresa'])}}">Slider</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#productosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-project-diagram mr-2"></i>Productos</a>
                <ul class="collapse list-unstyled" id="productosSubmenu">
                    <li>
                        <a href="{{ route('familia.index')}}">Categorías</a>
                    </li>
                    <li>
                        <a href="{{ route('familia.producto.index')}}">Productos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#ecoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fab fa-soundcloud mr-2"></i>Ecobruma</a>
                <ul class="collapse list-unstyled" id="ecoSubmenu">
                    <li>
                        <a href="{{ route('contenido.edit', ['seccion' => 'ecobruma'])}}">Contenido</a>
                    </li>
                    <li>
                        <a href="{{ route('slider.index', ['seccion' => 'ecobruma'])}}">Slider</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#videosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fab fa-youtube mr-2"></i>Videos</a>
                <ul class="collapse list-unstyled" id="videosSubmenu">
                    <li>
                        <a href="{{ route('contenido.edit', ['seccion' => 'videos'])}}">Todos los videos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#clientesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-tie mr-2"></i>Clientes</a>
                <ul class="collapse list-unstyled" id="clientesSubmenu">
                    <li>
                        <a href="{{ route('contenido.edit', ['seccion' => 'clientes'])}}">Todos los clientes</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#proyectosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-network-wired mr-2"></i>Proyectos</a>
                <ul class="collapse list-unstyled" id="proyectosSubmenu">
                    <li>
                        <a href="{{ route('proyecto.index')}}">Todos los proyectos</a>
                    </li>
                </ul>
            </li>
            <li><hr/></li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">GDS</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="{{ route('empresa.index')}}">Datos</a>
                    </li>
                    <li>
                        <a href="{{ route('empresa.metadatos')}}">Metadatos</a>
                    </li>
                    @if(Auth::user()["is_admin"])
                    <li>
                        <a href="{{ route('empresa.usuarios')}}">Usuarios</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('empresa.mis_datos')}}">Usuarios</a>
                    </li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="row m-0 position-absolute w-100" style="bottom: 0; left: 0;">
    <div class="col-12 col-md-6 px-0">
        <a href="https://osole.freshdesk.com/support/home" target="_blank" class="btn-gds py-2 btn-block text-uppercase text-center"><i class="fas fa-ticket-alt mr-2"></i>soporte</a>
    </div>
    <div class="col-12 col-md-6 px-0">
        <a href="{{route('adm.logout')}}" class="btn-danger btn-block py-2 text-uppercase text-center"><i class="fas fa-power-off mr-2"></i>Salir</a>
    </div>
</div>