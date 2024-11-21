<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalle de Descuento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/detalle.css') }}">  
</head>
<body>
    <div class="container">
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
    </div>
</body>
</html>
