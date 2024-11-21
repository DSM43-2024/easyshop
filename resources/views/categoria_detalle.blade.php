<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalle de Categoría</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/detalle.css') }}">     
</head>
<body>
    <div class="container">
        <h3>Detalle de Categoría</h3>
        <h5>CRUD: Categorías -> Detalle</h5>
        <hr>
        <p><b>ID de Categoría:</b> {{ $categoria->id_categoria }}</p>
        <p><b>Nombre:</b> {{ $categoria->nombre }}</p>
        <p><b>Tipo:</b> {{ $categoria->tipo }}</p>
        <a href="{{ route('categorias') }}">
            <button type="button">Regresar</button>
        </a>
    </div>
</body>
</html>
