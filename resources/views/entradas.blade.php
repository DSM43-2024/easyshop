<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Entrada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/form3.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
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
                <li class="nav-item"><a class="nav-link" href="{{ route('pp') }}">Proveedores-Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('proveedores') }}">Proveedores</a></li>
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
