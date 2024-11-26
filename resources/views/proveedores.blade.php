<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form2.css') }}">
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('ventas') }}">Ventas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('productos') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('personal') }}">Personal</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('descuentos') }}">Descuentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('entradas') }}">Entradas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ubicacion') }}">Ubicación</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categorias') }}">Categorías</a></li>

                    @if (Auth::user()->tipo === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('pp') }}">Proveedores-Productos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('proveedores') }}">Proveedores</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vp') }}">Ventas-Productos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Panel Admin</a></li>
                    @endif

                    @if (Auth::user()->tipo === 'vendedor')
                        <li class="nav-item"><a class="nav-link" href="{{ route('vendedor.dashboard') }}">Panel Vendedor</a></li>
                    @endif

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="d-flex justify-content-between align-items-center">
            <h3>Lista de Proveedores</h3>
            <form method="GET" action="{{ route('proveedores.buscar') }}" class="d-flex">
                <input type="text" class="form-control me-2" name="buscar" placeholder="Buscar proveedor" value="{{ request()->get('buscar') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <h5>CRUD: Proveedor</h5>
        <hr>
        
        <p class="text-right">
            <a href="{{ route('proveedor_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro</button>
            </a>
            <a href="{{ route('proveedores.exportarCSV', ['buscar' => request()->get('buscar')]) }}" class="btn btn-success mb-3">
                Exportar Proveedores a CSV
            </a>
        </p>
        <hr><br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Activo</th>
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
                        @if ($proveedor->activo)
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('proveedor_detalle',['id' => $proveedor->id_proveedor]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Detalle</button>
                        </a>
                        <a href="{{ route('proveedor_editar',['id' => $proveedor->id_proveedor]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                        </a>
                        <a href="{{ route('proveedor_borrar',['id' => $proveedor->id_proveedor]) }}" onclick="return confirm('¿Seguro que desea borrar al proveedor seleccionado?')">
                            <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                        </a>
                        <a href="{{ route('proveedor.toggleActivo', ['id' => $proveedor->id_proveedor]) }}" class="btn btn-warning btn-sm">
                            @if ($proveedor->activo)
                                Desactivar
                            @else
                                Activar
                            @endif
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $proveedores->links('pagination::bootstrap-5') }}
        </div>

        <!-- Gráficas -->
        <div class="mt-5">
            <h5>Distribución de Proveedores Activos vs Inactivos (Gráfica de Pastel)</h5>
            <canvas id="graficaPastelProveedores" width="400" height="200"></canvas>
        </div>

        <div class="mt-5">
            <h5>Distribución de Proveedores por Dominio de E-mail</h5>
            <canvas id="graficaDominioEmail" width="400" height="200"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Gráfico de Proveedores Activos vs Inactivos
                fetch("{{ route('proveedores.datos-grafica') }}")
                    .then(response => response.json())
                    .then(data => {
                        const ctx3 = document.getElementById('graficaPastelProveedores').getContext('2d');
                        new Chart(ctx3, {
                            type: 'pie',
                            data: {
                                labels: ['Activos', 'Inactivos'],
                                datasets: [{
                                    data: data.pieData,
                                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                                    borderWidth: 1
                                }]
                            }
                        });
                    })
                    .catch(error => console.error('Error:', error));

                // Gráfico de Proveedores por Dominio de Email
                fetch("{{ route('proveedores.obtenerDatosPorDominio') }}")
                    .then(response => response.json())
                    .then(data => {
                        const ctx4 = document.getElementById('graficaDominioEmail').getContext('2d');
                        new Chart(ctx4, {
                            type: 'bar',
                            data: {
                                labels: data.dominios,  // Dominio del correo
                                datasets: [{
                                    label: 'Número de Proveedores',
                                    data: data.totales,  // Conteo de proveedores
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            }
                        });
                    })
                    .catch(error => console.error('Error:', error));
            });
        </script>
    </div>
</body>
</html>
