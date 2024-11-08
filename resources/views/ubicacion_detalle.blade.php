<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalle de Ubicación</title>
</head>
<body>
    <h3>Detalle de Ubicación</h3>
    <h5>CRUD: Ubicaciones -> Detalle</h5>
    <hr>
    <p><b>ID de Ubicación:</b> {{ $ubicacion->id_ubicacion }}</p>
    <p><b>Estante:</b> {{ $ubicacion->estante }}</p>
    <p><b>Pasillo:</b> {{ $ubicacion->pasillo }}</p>
    <a href="{{ route('ubicacion') }}">
        <button type="button">Regresar</button>
    </a>
</body>
</html>
