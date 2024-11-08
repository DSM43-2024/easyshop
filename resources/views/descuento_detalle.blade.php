<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalle de Descuento</title>
</head>
<body>
    <h3>Detalle de Descuento</h3>
    <h5>CRUD: Descuentos -> Detalle</h5>
    <hr>
    <p><b>ID de Descuento:</b> {{ $descuento->id_descuento }}</p>
    <p><b>Nombre:</b> {{ $descuento->nombre }}</p>
    <p><b>Cantidad:</b> {{ $descuento->cantidad }}</p>
    <p><b>Activo:</b> {{ $descuento->activo }}</p>
    <a href="{{ route('descuentos') }}">
        <button type="button">Regresar</button>
    </a>
</body>
</html>
