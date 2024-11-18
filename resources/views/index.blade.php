<!DOCTYPE html>
<html lang="en">
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
                <a href="{{ route('login.form') }}" class="btn btn-primary me-2">Iniciar Sesión</a>
                <a href="{{ route('productos') }}" class="btn btn-secondary">Ver Productos</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
