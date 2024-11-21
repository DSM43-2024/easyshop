<!DOCTYPE html>
<html lang="en">
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('proveedores') }}">Inicio</a>
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
                        <a class="nav-link" href="{{ route('ubicacion') }}">Ubicación</a>
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
            <h3>Lista de Proveedores </h3>
            <!-- Cuadro de búsqueda -->
            <form method="GET" action="{{ route('proveedores.buscar') }}" class="d-flex">
                <input type="text" class="form-control me-2" name="buscar" placeholder="Buscar proveedor" value="{{ request()->get('buscar') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            
        </div>

        <h5>CRUD: Proveedor</h5>
        <hr>
        
        <p style="text-align: right;">
            <a href="{{ route('proveedor_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro</button>
            </a>
            <a href="{{ route('proveedores.exportarCSV') }}" class="btn btn-success mb-3">
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
        <div class="d-flex justify-content-center">
            {{ $proveedores->links('pagination::bootstrap-5') }}
        </div>
        <div class="mt-5">
    <h5>Distribución de Proveedores por Email</h5>
    <canvas id="graficaProveedores" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch("{{ route('proveedores.datos-grafica') }}")
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('graficaProveedores').getContext('2d');
                new Chart(ctx, {
                    type: 'bar', 
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Número de Proveedores',
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
