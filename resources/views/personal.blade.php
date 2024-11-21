<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/form2.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
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
                        <a class="nav-link" href="{{ route('pp') }}">Proveedores-Productos</a>
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
        <br><br>
        <h3>Lista de personal</h3>
        <form method="GET" action="{{ route('personal.buscar') }}" class="d-flex">
            <input type="text" class="form-control me-2" name="buscar" placeholder="Buscar personal" value="{{ request()->get('buscar') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <hr>
        <p style="text-align: right;">
            <a href="{{ route('personal_alta') }}">
                <button type="button" class="btn btn-info">Nuevo registro de personal</button>
            </a>
            <a href="{{ route('personal.exportarCSV') }}" class="btn btn-success mb-3">
                Exportar Personal a CSV
            </a>
        </p>
        <br><br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
            @foreach ($personal as $pr)
            <tr>
                <td>{{ $pr->id_personal }}</td>
                <td>{{ $pr->nombre }}</td>
                <td>{{ $pr->tipo }}</td>
                <td>{{ $pr->activo ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('personal_detalle', ['id' => $pr->id_personal]) }}">
                        <button type="button" class="btn btn-info btn-sm">Detalle</button>
                    </a>
                    <a href="{{ route('personal_editar', ['id' => $pr->id_personal]) }}">
                        <button type="button" class="btn btn-info btn-sm">Editar</button>
                    </a>  
                    <a href="{{ route('personal_borrar', ['id' => $pr->id_personal]) }}">
                        <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {{ $personal->links('pagination::bootstrap-5') }}
        </div>

        <div class="mt-5">
            <h5>Distribución de Personal por Tipo</h5>
            <canvas id="graficaPersonal" width="400" height="200"></canvas>
        </div>

        <div class="mt-5">
            <h5>Distribución de Personal Activo vs No Activo</h5>
            <canvas id="graficaActivo" width="400" height="200"></canvas>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch("{{ route('personal.datos-grafica') }}")
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('graficaPersonal').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar', 
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Número de Personal',
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

            fetch("{{ route('personal.datos-grafica-activo') }}")
                .then(response => response.json())
                .then(data => {
                    const ctxActivo = document.getElementById('graficaActivo').getContext('2d');
                    new Chart(ctxActivo, {
                        type: 'bar', 
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Estado del Personal',
                                data: data.data,
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 99, 132, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 99, 132, 1)'
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
</body>
</html>
