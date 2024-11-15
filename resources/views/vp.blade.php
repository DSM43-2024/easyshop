<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venta - Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <img src="{{ url('img/logo_utvt.jpg') }}" alt="" width="45">
                    TSU-DSM:
                </a>
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('vp') }}">Ventas - Productos</a>
                </div>
            </div>
        </nav>

        <br><br>

        <h3>Registrar Venta - Producto</h3>
        <hr>

        <form action="{{ route('vp_registrar') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_venta" class="form-label">Venta</label>
                <select class="form-select" name="id_venta" id="id_venta" required>
                    <option selected disabled>Selecciona una venta</option>
                    @foreach ($ventas as $venta)
                        <option value="{{ $venta->id_venta }}">{{ $venta->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_producto" class="form-label">Producto</label>
                <select class="form-select" name="id_producto" id="id_producto" required>
                    <option selected disabled>Selecciona un producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <h4>Ventas - Productos Registrados</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Venta</th>
                    <th>Producto</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vp as $registro)
                    <tr>
                        <td>{{ $registro->id_venta_producto }}</td>
                        <td>{{ $registro->venta->nombre ?? 'N/A' }}</td>
                        <td>{{ $registro->producto->nombre ?? 'N/A' }}</td>
                        <td>{{ $registro->fecha }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>
