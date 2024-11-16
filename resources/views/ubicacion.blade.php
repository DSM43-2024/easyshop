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
        <br><br>
        <h3>Lista de Ubicaciones</h3>
        <h5>CRUD: Ubicación</h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{ route('ubicacion_alta') }}">
                <button type="button" class="btn btn-info">Nuevo registro de ubicación</button>
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
