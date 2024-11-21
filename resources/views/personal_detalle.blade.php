<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalle de Personal</title>
    <link rel="stylesheet" href="{{ asset('css/detalle.css') }}"> <!-- Enlace al CSS -->
</head>
<body>
    <div class="container">
        <h3>Detalle de Personal</h3>
        <h5>CRUD: Personal -> Detalle</h5>
        <hr>
        <p><b>ID de Personal:</b> {{ $personal->id_personal }}</p>
        <p><b>Tipo:</b> {{ $personal->tipo }}</p>
        <p><b>Activo:</b> {{ $personal->activo }}</p>
        <a href="{{ route('personal') }}">
            <button type="button">Regresar</button>
        </a>
    </div>
</body>
</html>
