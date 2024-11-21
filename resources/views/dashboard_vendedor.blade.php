<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Vendedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Bienvenido Vendedor</h2>
        <div class="row g-3">
            <!-- Ventas -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Ventas</h5>
                        <a href="{{ route('ventas') }}" class="btn btn-primary">Ver Ventas</a>
                    </div>
                </div>
            </div>
            <!-- Productos -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Productos</h5>
                        <a href="{{ route('productos') }}" class="btn btn-success">Gestionar Productos</a>
                    </div>
                </div>
            </div>
            <!-- Categorías -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Categorías</h5>
                        <a href="{{ route('categorias') }}" class="btn btn-warning">Ver Categorías</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario para logout -->
        <form action="{{ route('logout') }}" method="POST" class="text-center mt-4">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
