<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorías</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/form2.css') }}">
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('personal') }}">Personal</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('descuentos') }}">Descuentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('entradas') }}">Entradas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('productos') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('proveedores') }}">Proveedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ubicacion') }}">Ubicación</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ventas') }}">Ventas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pp') }}">Proveedores-Productos</a></li>
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

        <h3 class="mb-4">Lista de Categorías</h3>
        <h5 class="mb-4">CRUD: Categoría</h5>

        <!-- Filtro de Categorías -->
        <form method="GET" action="{{ route('categorias.buscar') }}" class="d-flex mb-4">
            <input type="text" class="form-control me-2" name="buscar" placeholder="Buscar categoría" value="{{ request()->get('buscar') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <hr>

        <!-- Acciones de Categorías -->
        <p class="text-right">
            <a href="{{ route('categoria_alta') }}">
                <button type="button" class="btn btn-info">Nuevo registro de categoría</button>
            </a>
            <a href="{{ route('categorias.exportarCSV') }}" class="btn btn-success mb-3">Exportar a CSV</a>
        </p>

        <br><br>

        <!-- Tabla de Categorías -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id_categoria }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->tipo }}</td>
                    <td>
                        <a href="{{ route('categoria_detalle', ['id' => $categoria->id_categoria]) }}">
                            <button type="button" class="btn btn-info btn-sm">Detalle</button>
                        </a>
                        <a href="{{ route('categoria_editar', ['id' => $categoria->id_categoria]) }}">
                            <button type="button" class="btn btn-warning btn-sm">Editar</button>
                        </a>
                        <a href="{{ route('categoria_borrar', ['id' => $categoria->id_categoria]) }}">
                            <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $categorias->links('pagination::bootstrap-5') }}

        <!-- Gráficas -->
        <div class="mt-5">
            <h5>Distribución de Categorías por Tipo</h5>
            <canvas id="graficaCategorias" width="400" height="200"></canvas>
        </div>

        <div class="mt-5">
            <h5>Distribución de Categorías por Fecha</h5>
            <canvas id="graficaFechas" width="400" height="200"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Gráfica de Categorías por Tipo
                fetch("{{ route('categorias.datos-grafica') }}")
                    .then(response => response.json())
                    .then(data => {
                        const ctx = document.getElementById('graficaCategorias').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    label: 'Número de Categorías',
                                    data: data.data,
                                    backgroundColor: [
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(153, 102, 255, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(153, 102, 255, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                }
                            }
                        });
                    });

                // Gráfica de Categorías por Fecha
                fetch("{{ route('categorias.graficaFechas') }}")
                    .then(response => response.json())
                    .then(data => {
                        const ctxFechas = document.getElementById('graficaFechas').getContext('2d');
                        new Chart(ctxFechas, {
                            type: 'line',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    label: 'Categorías creadas',
                                    data: data.data,
                                    borderColor: '#36A2EB',
                                    backgroundColor: 'rgba(54,162,235,0.2)',
                                    fill: true
                                }]
                            }
                        });
                    });
            });
        </script>
    </div>
</body>
</html>
