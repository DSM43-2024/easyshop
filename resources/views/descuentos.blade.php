<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de descuentos</title>
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
                        <a class="nav-link" href="{{ route('personal') }}">Personal</a>
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
                        <a class="nav-link" href="{{ route('ubicacion') }}">Ubicación</a>
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
        <h3>Lista de descuento  </h3>
        <h5>CRUD:descuentos</h5>
        <form method="GET" action="{{ route('descuentos.buscar') }}" class="d-flex">
                <input type="text" class="form-control me-2" name="buscar" placeholder="Buscar descuento" value="{{ request()->get('buscar') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        <hr>
        <p style="text-align: right;">
            <a href="{{route('descuento_alta')}}">
                <button type="button" class="btn btn-info">Nuevo registro de descuentos</button>
            </a>
            <a href="{{ route('descuentos.exportarCSV') }}" class="btn btn-success mb-3">
    Exportar a CSV
</a>

        </p>
        <br><br>
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>descuento</th>
                <th>cantidad</th>
                <th>activo</th>
                <th>Otros</th>
            </tr>
            @foreach ($descuentos as $descuento)
            <tr>
                <td>{{$descuento->id_descuento}}</td>
                <td>{{$descuento->nombre}}</td>
                <td>{{$descuento->descuento}}</td>
                <td>{{$descuento->cantidad}}</td>
                <td>{{$descuento->activo}}</td>
                <td>{{$descuento->tipo}}</td>

                <td>
                    <a href="{{route('descuento_detalle',['id' =>$descuento->id_descuento])}}">
                        <button type="button" class="btn btn-info btn-sm">Detalle</button>
                    </a>
                    <a href="{{route('descuento_editar',['id' =>$descuento->id_descuento])}}">
                        <button type="button" class="btn btn-info btn-sm">Editar</button>
                    </a>  <a href="{{route('descuento_borrar',['id' =>$descuento->id_descuento])}}">
                        <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $descuentos->links('pagination::bootstrap-5') }}
        <div class="pagination pagination-sm"></div>
    </div>
</body>
</html>