<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de proveedores</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pN1yT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9KWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


</head>
<body>
    <div class="container">
        <h3>Lista de Proveedores </h3>
        <h5>CRUD: Proveedor</h5>
        <hr>

        <p style="text-align: right;">
            <a href="{{ route('proveedor_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro</button>
            </a>
        </p>
        <hr><br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id_proveedor }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->email }}</td>
                    <td>
                        <a href="{{ route('proveedor_detalle',['id' => $proveedor->id_proveedor]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Detalle</button>
                        </a>
                        <a href="{{ route('proveedor_editar',['id' => $proveedor->id_proveedor]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                        </a>
                        <a href="{{ route('proveedor_borrar',['id' => $proveedor->id_proveedor]) }}" onclick="return confirm('¿Seguro que desea borrar al personal seleccionado?')">
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
