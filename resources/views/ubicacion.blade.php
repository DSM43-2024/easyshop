<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ubicaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form2.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('index') }}">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('categorias') }}">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('descuentos') }}">Descuentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('entradas') }}">Entradas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('personal') }}">Personal</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('productos') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('proveedores') }}">Proveedores</a></li>
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
        <br>
        <div class="d-flex justify-content-between align-items-center">
            <h3>Lista de Ubicaciones</h3>
            <form method="GET" action="{{ route('ubicacion.buscar') }}" class="d-flex">
                <input type="text" class="form-control me-2" name="buscar" placeholder="Buscar ubicación" value="{{ request()->get('buscar') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
        <h5>CRUD: Ubicación</h5>
        <hr>
        <p class="text-right">
            <a href="{{ route('ubicacion_alta') }}">
                <button type="button" class="btn btn-info">Nuevo registro de ubicación</button>
            </a>
            <a href="{{ route('ubicacion.exportarCSV') }}" class="btn btn-success mb-3">Exportar Ubicaciones a CSV</a>
        </p>
        <br>
        <table class="table table-striped">
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
                        <a href="{{ route('ubicacion_borrar', ['id' => $item->id_ubicacion]) }}" onclick="return confirm('¿Seguro que desea borrar esta ubicación?')">
                            <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5">
            <h5>Distribución de Ubicaciones por Pasillo</h5>
            <canvas id="graficaPasillo" width="400" height="200"></canvas>
        </div>

        <div class="mt-5">
            <h5>Distribución de Ubicación por Estante</h5>
            <canvas id="graficaEstante" width="400" height="200"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                fetch("{{ route('ubicacion.datos-grafica') }}")
                    .then(response => response.json())
                    .then(data => {
                        const ctxPasillo = document.getElementById('graficaPasillo').getContext('2d');
                        new Chart(ctxPasillo, {
                            type: 'bar',
                            data: {
                                labels: data.labels, // Pasillos
                                datasets: [{
                                    label: 'Número de Ubicaciones',
                                    data: data.data, // Cantidad de ubicaciones por pasillo
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

                        const ctxEstante = document.getElementById('graficaEstante').getContext('2d');
                        new Chart(ctxEstante, {
                            type: 'bar',
                            data: {
                                labels: data.labels, 
                                datasets: [{
                                    label: 'Número de Ubicaciones',
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
            });
        </script>
        
    </div>
</body>
</html>
