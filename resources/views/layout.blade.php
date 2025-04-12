<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-$gray-200">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">P-III</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-lock"></i>
                        Seguridad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-line"></i>
                            Reportes</a>
                </li>
                <!-- Reemplaza la sección de Inventario en el navbar -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-store"></i> Inventario
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('marcas.index') }}">
                <i class="fas fa-tag"></i> Marcas
            </a></li>
        <li>
            <a class="dropdown-item" href="{{ route('transportes.index') }}">
                <i class="fas fa-truck-moving"></i> Transportes
            </a></li>
        <li>
            <a class="dropdown-item" href="{{ route('productos.index') }}">
                <i class="fas fa-shopping-cart"></i> Produtos
            </a></li>
        <li>
             <a class="dropdown-item" href="{{ route('camiones.index') }}">
                <i class="fas fa-truck"></i> Camiones
             </a></li>
    </ul>
</li>
            </ul>
        </div>
    </div>
</nav>
<section class="content">
    <div class="container-fluid">
        @yield('content')
    </div><!-- /.container-fluid -->
</section>

</body>
