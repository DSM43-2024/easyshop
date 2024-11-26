<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/form3.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('index') }}">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Opciones comunes -->
            <li class="nav-item"><a class="nav-link" href="{{ route('ventas') }}">Ventas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('productos') }}">Productos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('personal') }}">Personal</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('descuentos') }}">Descuentos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('entradas') }}">Entradas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ubicacion') }}">Ubicación</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('categorias') }}">Categorias</a></li>


            <!-- Opciones específicas para administradores -->
            @if (Auth::user()->tipo === 'admin')
            <li class="nav-item"><a class="nav-link" href="{{ route('proveedores') }}">Proveedores</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pp') }}">Proveedores-Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('vp') }}">Ventas-Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Panel Admin</a></li>
            @endif

            <!-- Opciones específicas para vendedores -->
            @if (Auth::user()->tipo === 'vendedor')
                <li class="nav-item"><a class="nav-link" href="{{ route('vendedor.dashboard') }}">Panel Vendedor</a></li>
            @endif

            <!-- Cerrar sesión -->
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

        <h3>Productos</h3>

        <hr><br>
        <form action="{{ route('producto_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del producto">
                <label class="input-group-text" for="nombre">Nombre</label>
            </div>

            <div class="input-group mb-3">
                <input type="number" class="form-control" name="stock" id="stock" placeholder="Cantidad en stock">
                <label class="input-group-text" for="stock">Stock</label>
            </div>

            <div class="input-group mb-3">
                <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio del producto">
                <label class="input-group-text" for="precio">Precio</label>
            </div>

            <div class="input-group mb-3">
                <input type="date" class="form-control" name="caducidad" id="caducidad">
                <label class="input-group-text" for="caducidad">Fecha de Caducidad</label>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" name="id_categoria" id="id_categoria">
                    <option selected>Selecciona una Opción...</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_categoria">Categorías</label>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" name="id_descuento" id="id_descuento">
                    <option selected>Selecciona una Opción...</option>
                    @foreach($descuentos as $descuento)
                        <option value="{{ $descuento->id_descuento }}">{{ $descuento->nombre }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_descuento">Descuento</label>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" name="id_ubicacion" id="id_ubicacion">
                    <option selected>Selecciona una Opción...</option>
                    @foreach($ubicaciones as $ubicacion)
                        <option value="{{ $ubicacion->id_ubicacion }}">{{ $ubicacion->pasillo }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_ubicacion">Ubicación</label>
            </div>

            <div class="input-group mb-3">
                <input type="checkbox" class="form-check-input" name="activo" id="activo" checked>
                <label class="form-check-label" for="activo">Activo</label>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <br><br><br>

        <h1>Lista de productos</h1>
        
        <br>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Descuento</th>
                    <th>Ubicación</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Fecha de Caducidad</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id_producto }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}</td>
                    <td>{{ $producto->descuento ? $producto->descuento->nombre : 'Sin descuento' }}</td>
                    <td>{{ $producto->ubicacion ? $producto->ubicacion->pasillo : 'Sin ubicación' }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->caducidad }}</td>
                    <td>{{ $producto->activo ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('producto_borrar', ['id' => $producto->id_producto]) }}">
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que deseas eliminar el registro?')">
                                Borrar
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
