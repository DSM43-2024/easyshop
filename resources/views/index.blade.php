<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-4">Bienvenido a EasyShop</h1>
            <p class="lead">Selecciona una opción según tu perfil.</p>
            <div class="d-flex justify-content-center">
                <!-- Opciones generales -->
                <a href="{{ route('login.form') }}" class="btn btn-primary me-2">Iniciar Sesión</a>
                <a href="{{ route('productos') }}" class="btn btn-secondary">Ver Productos</a>
            </div>

            <hr class="my-4">

            <!-- Opciones específicas según el perfil -->
            <div>
                <h4>Accesos Directos</h4>
                <div class="d-flex justify-content-center mt-3">
    @auth
        @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger me-2">Dashboard Admin</a>
        @endif
        @if(auth()->user()->isVendedor())
            <a href="{{ route('vendedor.dashboard') }}" class="btn btn-success me-2">Dashboard Vendedor</a>
        @endif
    @endauth
</div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
