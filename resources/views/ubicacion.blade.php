<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ubicaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('index') }}">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorias') }}">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('descuentos') }}">Descuentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('entradas') }}">Entradas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personal') }}">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proveedores') }}">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personal') }}">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ventas') }}">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pp') }}">Proveedores-Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ventas') }}">Ventas</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br><br>
        <h3>Lista de Ubicaciones</h3>
        <h5>CRUD: Ubicación</h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{ route('ubicacion_alta') }}">
                <button type="button" class="btn btn-info">Nuevo registro de ubicación</button>
            </a>
            <a href="{{ route('ubicacion.exportarCSV') }}" class="btn btn-success mb-3">
    Exportar Ubicaciones a CSV
</a>

        </p>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estante</th>
                    <th>Pasillo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ubicacion as $item)
                <tr>
                    <td>{{ $item->id_ubicacion }}</td>
                    <td>{{ $item->estante }}</td>
                    <td>{{ $item->pasillo }}</td>
                    <td>
                        <a href="{{ route('ubicacion_detalle', ['id' => $item->id_ubicacion]) }}">
                            <button type="button" class="btn btn-info btn-sm">Detalle</button>
                        </a>
                        <a href="{{ route('ubicacion_editar', ['id' => $item->id_ubicacion]) }}">
                            <button type="button" class="btn btn-info btn-sm">Editar</button>
                        </a>
                        <a href="{{ route('ubicacion_borrar', ['id' => $item->id_ubicacion]) }}">
                            <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $ubicacion->links('pagination::bootstrap-5') }}
        </div>
    </div>
</body>
</html>
