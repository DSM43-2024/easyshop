<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h3>Registro de Venta</h3>
        <form action="{{ route('venta_registrar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Venta</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre de la venta" required>
            </div>
            <div class="mb-3">
                <label for="id_personal" class="form-label">Personal Responsable</label>
                <select class="form-select" name="id_personal" id="id_personal" required>
                    <option selected>Selecciona una opción</option>
                    @foreach ($personales as $personal)
                        <option value="{{ $personal->id_personal }}">{{ $personal->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tipo_venta" class="form-label">Tipo de Venta</label>
                <select class="form-select" name="tipo_venta" id="tipo_venta" required>
                    <option selected>Selecciona una opción</option>
                    <option value="Venta Directa">Venta Directa</option>
                    <option value="Venta a Crédito">Venta a Crédito</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_venta" class="form-label">Fecha de Venta</label>
                <input type="date" class="form-control" name="fecha_venta" id="fecha_venta" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>

        <br><hr>

        <h4>Lista de Ventas Registradas</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Personal Responsable</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id_venta }}</td>
                        <td>{{ $venta->nombre }}</td>
                        <td>{{ $venta->personal->nombre }}</td>
                        <td>
                            <a href="{{ route('venta_borrar', ['id' => $venta->id_venta]) }}">
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas borrar el registro?')">Borrar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
