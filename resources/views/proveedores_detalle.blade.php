<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalle de Proveedor</title>
</head>
<body>
    <h3>Detalle de Proveedor</h3>
    <h5>CRUD: Proveedores -> Detalle</h5>
    <hr>
    <p><b>ID de Proveedor:</b> {{ $proveedor->id_proveedor }}</p>
    <p><b>Nombre:</b> {{ $proveedor->nombre }}</p>
    <p><b>Email:</b> {{ $proveedor->email }}</p>
    <p><b>Fecha de Creación:</b> {{ $proveedor->created_at }}</p>
    <p><b>Fecha de Actualización:</b> {{ $proveedor->updated_at }}</p>
    <a href="{{ route('proveedores') }}">
        <button type="button">Regresar</button>
    </a>
</body>
</html>
