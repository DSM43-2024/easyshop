<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores - Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="{{ route('ubicacion') }}">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ventas') }}">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personal') }}">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ventas') }}">Ventas</a>
                    </li>
                    <li class="nav-item">
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Cerrar sesión</button>
    </form>
</li>

                </ul>
            </div>
        </nav>

        <br><br><br>
        <h3>Proveedores - Productos</h3>
        <h5>Registro de Proveedores - Productos</h5>
        <hr><br>

        <form action="{{route('pp_registrar')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <select class="form-select" name="id_proveedor" id="id_proveedor" required>
                    <option selected disabled>Selecciona una Opción...</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_proveedor">Proveedor</label>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" name="id_producto" id="id_producto" required>
                    <option selected disabled>Selecciona una Opción...</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_producto">Producto</label>
            </div>
            
            <hr><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <br><br><br>

        <h1>Lista de Proveedores - Productos</h1>
        <hr>

        <table class="table">
    <thead>
        <tr>
            <th>N°</th>
            <th>Proveedor</th>
            <th>Producto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pp as $registro)
            <tr>
                <td>{{ $registro->id_proveedor_producto }}</td>
                <td>{{ $registro->proveedor->nombre ?? 'N/A' }}</td>
                <td>{{ $registro->producto->nombre ?? 'N/A' }}</td>
                <td>
                <a href="{{ route('pp_borrar', ['id' => $registro->id_proveedor_producto]) }}" 
   onclick="return confirm('¿Seguro que deseas eliminar el registro?')">
    <button type="button" class="btn btn-danger btn-sm">Borrar</button>
</a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

        <br><br><br>
    </div>
</body>
</html>
