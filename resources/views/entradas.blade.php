<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Entrada</title>
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
                    <a class="nav-link" href="{{ route('entradas') }}">Entradas</a>
                </div>
            </div>
        </nav>

        <br><br>

        <h3>Registrar Entrada de Producto</h3>
        <hr>

        <form action="{{ route('entrada_registrar') }}" method="POST">
            @csrf

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
                <label for="id_proveedor" class="form-label">Proveedor</label>
                <select class="form-select" name="id_proveedor" id="id_proveedor" required>
                    <option selected disabled>Selecciona un proveedor</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="created_at" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="created_at" name="created_at" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <br><br>

        <h4>Lista de Entradas</h4>
        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>ID Entrada</th>
                    <th>Producto</th>
                    <th>Proveedor</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entradas as $entrada)
                    <tr>
                        <td>{{ $entrada->id_entrada }}</td>
                        <td>{{ $entrada->producto->nombre ?? 'N/A' }}</td>
                        <td>{{ $entrada->proveedor->nombre ?? 'N/A' }}</td>
                        <td>{{ $entrada->created_at }}</td>
                        <td>
                            <a href="{{ route('entrada_borrar', ['id' => $entrada->id_entrada]) }}" 
                               onclick="return confirm('¿Seguro que deseas eliminar la entrada?')">
                                <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
