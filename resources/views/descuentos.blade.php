<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Descuentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form2.css') }}">
    

</head>
<body class="bg-dark text-light"> 
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <a class="nav-link" href="{{ route('ventas') }}">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pp') }}">Proveedores-Productos</a>
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

        <div class="d-flex justify-content-between align-items-center">
            <h3>Lista de Descuentos</h3>
            <form method="GET" action="{{ route('descuentos.buscar') }}" class="d-flex">
                <input type="text" class="form-control me-2" name="buscar" placeholder="Buscar descuento" value="{{ request()->get('buscar') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <h5>CRUD: Descuentos</h5>
        <hr>

        <p class="text-right">
            <a href="{{ route('descuento_alta') }}">
                <button type="button" class="btn btn-info">Nuevo registro de descuento</button>
            </a>
            <a href="{{ route('descuentos.exportarCSV') }}" class="btn btn-success mb-3">Exportar Descuentos a CSV</a>
        </p>

        <br>
        <table class="table table-dark table-striped"> <!-- Se ha agregado clase table-dark para que sea oscuro -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($descuentos as $descuento)
                <tr>
                    <td>{{ $descuento->id_descuento }}</td>
                    <td>{{ $descuento->nombre }}</td>
                    <td>{{ $descuento->cantidad }}</td>
                    <td>{{ $descuento->activo ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('descuento_detalle', ['id' => $descuento->id_descuento]) }}">
                            <button type="button" class="btn btn-info btn-sm">Detalle</button>
                        </a>
                        <a href="{{ route('descuento_editar', ['id' => $descuento->id_descuento]) }}">
                            <button type="button" class="btn btn-info btn-sm">Editar</button>
                        </a>
                        <a href="{{ route('descuento_borrar', ['id' => $descuento->id_descuento]) }}" onclick="return confirm('¿Seguro que desea borrar este descuento?')">
                            <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Primer gráfico: Distribución por Nombre -->
        <div class="mt-5">
            <h5>Distribución de Descuentos por Nombre</h5>
            <canvas id="graficaDescuentosNombre" width="400" height="200"></canvas>
        </div>

        <!-- Segundo gráfico: Distribución por Cantidad -->
        <div class="mt-5">
            <h5>Distribución de Descuentos por Cantidad</h5>
            <canvas id="graficaDescuentosCantidad" width="400" height="200"></canvas>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                fetch("{{ route('descuentos.datosGrafica') }}")
                    .then(response => response.json())
                    .then(data => {
                        // Gráfica de Distribución por Nombre
                        const ctxNombre = document.getElementById('graficaDescuentosNombre').getContext('2d');
                        new Chart(ctxNombre, {
                            type: 'bar',
                            data: {
                                labels: data.labels, // Nombre de los descuentos
                                datasets: [{
                                    label: 'Cantidad de Descuentos por Nombre',
                                    data: data.data, // Cantidad de cada descuento
                                    backgroundColor: 'rgba(105, 29, 216, 0.5)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
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

                        // Gráfica de Distribución por Cantidad
                        const ctxCantidad = document.getElementById('graficaDescuentosCantidad').getContext('2d');
                        new Chart(ctxCantidad, {
                            type: 'bar',
                            data: {
                                labels: data.labels, // Nombre de los descuentos
                                datasets: [{
                                    label: 'Cantidad de Descuentos',
                                    data: data.data, // Cantidad de cada descuento
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
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

        <div class="d-flex justify-content-center">
            {{ $descuentos->links('pagination::bootstrap-5') }}
        </div>
    </div>
</body>
</html>
