<header class="bg-warning py-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <h1 class="h4 m-0 text-dark">Alquimarket</h1>
                </a>
            </div>
            <div class="col-md-6">
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar productos en alquiler..." name="q">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3 text-end">
                @auth
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Mi cuenta
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-dark me-2">Ingresar</a>
                    <a href="{{ route('register') }}" class="btn btn-dark">Crear cuenta</a>
                @endauth
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories') }}">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('offers') }}">Ofertas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('history') }}">Historial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('publish') }}">Publicar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Productos</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservations.index') }}">Mis Reservas</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>