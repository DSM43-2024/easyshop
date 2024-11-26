<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalle de Proveedor</title>
    <link rel="stylesheet" href="{{ asset('css/detalle.css') }}"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Detalle de Proveedor</h3>
                <h5>CRUD: Proveedores -> Detalle</h5>
            </div>
            <div class="card-body">
                <p><b>ID de Proveedor:</b> {{ $proveedor->id_proveedor }}</p>
                <p><b>Nombre:</b> {{ $proveedor->nombre }}</p>
                <p><b>Email:</b> {{ $proveedor->email }}</p>
                <p><b>Fecha de Creación:</b> {{ $proveedor->created_at }}</p>
                <p><b>Fecha de Actualización:</b> {{ $proveedor->updated_at }}</p>
                <p><b>Activo:</b> {{ $proveedor->activo ? 'Sí' : 'No' }}</p> <!-- Campo 'activo' añadido -->
                <a href="{{ route('proveedores') }}">
                    <button type="button">Regresar</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
