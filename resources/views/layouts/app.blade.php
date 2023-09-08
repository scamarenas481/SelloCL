<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="sidebarLabel">Dashboard</h5>

                <button type="button" class="btn btn-closecanvas" data-bs-dismiss="offcanvas" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z">
                        </path>
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="offcanvas-body">
                <!-- Aquí puedes agregar el contenido del sidebar, por ejemplo, enlaces a diferentes secciones -->
                <ul class="navbar-nav">
                    @auth
                        <!-- AQUI VAMOS A PORNER EL CONTENIDO DE LOS INICIOS DE CADA TIPO DE ROL (manejar variables de sesion-->
                        @if (auth()->user()->activeRole && auth()->user()->activeRole->name === 'Ventas')
                        <li class="nav-item align-vertical">
                                <a class="navbar-brand" href="{{ url('/home') }}">
                                    <img name="logonv" class="logonv" src="{{ asset('images/COM1.svg') }}" alt="Logo de la Empresa">
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->activeRole && auth()->user()->activeRole->name === 'Administrador')
                        <li class="nav-item align-vertical">
                            <a class="navbar-brand" href="{{ url('/home') }}">
                                <img name="logonv" class="logonv" src="{{ asset('images/COM1.svg') }}" alt="Logo de la Empresa">
                            </a>
                        </li>
                        @endif

                        @if (auth()->user()->activeRole && auth()->user()->activeRole->name === 'Ventas')
                            <li class="nav-item {{ request()->is('productos-nuevos.crear') ? 'active' : '' }}">
                                <a class="nav-link {{ request()->is('productos-nuevos.crear') ? 'nav-link-active' : '' }}"
                                    href="{{ route('productos-nuevos.crear') }}">Productos Solicitados</a>
                            </li>
                        @endif

                        @if (auth()->user()->activeRole && auth()->user()->activeRole->name === 'Administrador')
                        <li class="nav-item {{ str_starts_with(request()->path(), 'users') || str_starts_with(request()->path(), 'roles') ? 'active' : '' }}">
                            <a class="nav-link {{ str_starts_with(request()->path(), 'users') || str_starts_with(request()->path(), 'roles') ? 'nav-linktttest@test.comest@test.comest@test.com-active' : '' }}"
                                href="{{route('users.index')}}">Usuarios</a>
                        </li>


                            <li class="nav-item {{ request()->is('productos-nuevos.crear') ? 'active' : '' }}">
                                <a class="nav-link {{ request()->is('productos-nuevos.crear') ? 'nav-link-active' : '' }}"
                                    href="#">Productos</a>
                            </li>
                            <li class="nav-item {{ request()->is('productos-nuevos.crear') ? 'active' : '' }}">
                                <a class="nav-link {{ request()->is('productos-nuevos.crear') ? 'nav-link-active' : '' }}"
                                    href="{{ route('productos-nuevos.crear') }}">Productos Solicitados</a>
                            </li>
                        @endif
                </ul>
                <ul class="navbar-nav flex-row flex-wrap ms-md-auto" >
                    <li class="nav-item align-vertical">
                        <span class="navbar-text">Rol: {{ auth()->user()->activeRole->name }}</span>
                    </li>
                    <div style="align-items: flex-end">
                        <li class="nav-item ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/bitmap.svg') }}" alt="Avatar del Usuario" class="user-avatar" style="width: 25px">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('selectRole') }}">Seleccionar Rol</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </div>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Secondary Navigation (Dropdowns para CRUDs) -->
    @if (str_contains(request()->path(), 'users') || str_contains(request()->path(), 'roles'))
        <nav class="navbar secondary-navigation navbar-expand navbar-light bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <!-- Dropdown de Usuarios -->
                    <li class="nav-item dropdown">
                        <a class="nav-link submenu dropdown-toggle" href="#" id="usuariosDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuarios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="usuariosDropdown">
                            <!-- Agrega los enlaces del CRUD de Usuarios aquí -->
                            <li><a class="dropdown-item" href="{{ route('users.create') }}">Crear Usuario</a></li>
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">Listar Usuarios</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown de Roles -->
                    <li class="nav-item dropdown">
                        <a class="nav-link submenu dropdown-toggle" href="#" id="rolesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Roles
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="rolesDropdown">
                            <!-- Agrega los enlaces del CRUD de Roles aquí -->
                            <li><a class="dropdown-item" href="{{ route('roles.create') }}">Crear Rol</a></li>
                            <li><a class="dropdown-item" href="{{ route('roles.index') }}">Listar Roles</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    @endif

    @if (request()->is('productos'))
        <nav class="navbar secondary-navigation navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <!-- Dropdown de Productos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link submenu dropdown-toggle" href="#" id="productosDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productosDropdown">
                            <!-- Agrega los enlaces del CRUD de Productos aquí -->
                            <li><a class="dropdown-item" href="#">Crear Producto</a></li>
                            <li><a class="dropdown-item" href="#">Listar Producto</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar Producto</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar Producto</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown de Productos Nuevos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link submenu dropdown-toggle" href="#" id="productosNuevosDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Productos Nuevos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productosNuevosDropdown">
                            <!-- Agrega los enlaces del CRUD de Productos Nuevos aquí -->
                            <li><a class="dropdown-item" href="#">Crear Producto Nuevo</a></li>
                            <li><a class="dropdown-item" href="#">Listar Productos Nuevos</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar Producto Nuevo </a></li>
                            <li><a class="dropdown-item" href="#">Eliminar Producto Nuevo</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown de Líneas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="lineasDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Líneas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="lineasDropdown">
                            <!-- Agrega los enlaces del CRUD de Líneas aquí -->
                            <li><a class="dropdown-item" href="#">Crear Línea</a></li>
                            <li><a class="dropdown-item" href="#">Listar Líneas</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar Línea</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar Línea</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown de Almacén -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="almacenDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Almacén
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="almacenDropdown">
                            <!-- Agrega los enlaces del CRUD de Almacén aquí -->
                            <li><a class="dropdown-item" href="#">Crear Almacén</a></li>
                            <li><a class="dropdown-item" href="#">Listar Almacenes</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar Almacén</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar Almacén</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown de Control de Almacén -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="controlAlmacenDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Control de Almacén
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="controlAlmacenDropdown">
                            <!-- Agrega los enlaces del CRUD de Control de Almacén aquí -->
                            <li><a class="dropdown-item" href="#">Crear Control de Almacén</a></li>
                            <li><a class="dropdown-item" href="#">Listar Controles de Almacén</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar Control de Almacén</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar Control de Almacén</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown de Marcas y Fabricantes -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="marcasFabricantesDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Marcas y Fabricantes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="marcasFabricantesDropdown">
                            <!-- Agrega los enlaces del CRUD de Marcas y Fabricantes aquí -->
                            <li><a class="dropdown-item" href="#">Crear Marca/Fabricante</a></li>
                            <li><a class="dropdown-item" href="#">Listar Marcas/Fabricantes</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar Marca/Fabricante</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar Marca/Fabricante</a></li>
                        </ul>
                    </li>
                    <!-- Agrega más Dropdowns aquí -->
                </ul>
            </div>
        </nav>
    @endif

    @if (str_contains(request()->path(), 'productos-nuevos'))
        <nav class="navbar secondary-navigation navbar-expand navbar-light bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <!-- Enlace para registrar un nuevo producto -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos-nuevos.crear') }}">Registrar Producto</a>
                    </li>

                    <!-- Enlace para listar todos los productos nuevos -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos-nuevos.show') }}">Listar Productos </a>
                    </li>

                    <!-- Enlace para revisar productos nuevos -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Revisar Productos </a>
                    </li>

                    <!-- Agrega más enlaces según tus necesidades -->
                </ul>
            </div>
        </nav>
    @endif



    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Script necesario para el funcionamiento de Bootstrap y el Offcanvas -->

    <!-- Script necesario para el funcionamiento de Bootstrap y el Offcanvas -->
    <script>
        // Función para agregar la clase "active" al menú principal y menús desplegables del Secondary Navigation
        function setActiveMenus() {
            const currentPath = window.location.pathname; // Obtiene la ruta actual
            const mainMenuLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const dropdownMenuLinks = document.querySelectorAll('.dropdown-menu .dropdown-item');

            mainMenuLinks.forEach(link => {
                const linkPath = link.getAttribute('href');
                if (currentPath === linkPath) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });

            dropdownMenuLinks.forEach(link => {
                const linkPath = link.getAttribute('href');
                if (currentPath === linkPath) {
                    const dropdownToggle = link.closest('.dropdown').querySelector('.dropdown-toggle');
                    dropdownToggle.classList.add('active');
                }
            });
        }

        // Ejecuta la función cuando se carga la página y también cuando cambia de página
        document.addEventListener('DOMContentLoaded', setActiveMenus);
        window.addEventListener('popstate', setActiveMenus);
    </script>


</body>

</html>
