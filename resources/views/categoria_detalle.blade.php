<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalle de Categoría</title>
</head>
<body>
    <h3>Detalle de Categoría</h3>
    <h5>CRUD: Categorías -> Detalle</h5>
    <hr>
    <p><b>ID de Categoría:</b> {{ $categoria->id_categoria }}</p>
    <p><b>Nombre:</b> {{ $categoria->nombre }}</p>
    <p><b>Tipo:</b> {{ $categoria->tipo }}</p>
    <a href="{{ route('categorias') }}">
        <button type="button">Regresar</button>
    </a>
</body>
</html>
