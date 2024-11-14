<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <img src="{{ url('img/logo_utvt.jpg')}}" alt="" width="45">
                    TSU-DSM:
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('entradas')}}">entradas</a>//id_entradas---alumnos
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('productos')}}">productos</a>//id_producto---grupos
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('proveedores')}}">proveedores</a>//id_proveedor---carreras
                       // </li>
                       // <li class="nav-item">
                         //   <a class="nav-link" href="{{route('asignacion_gc')}}">Asignacion Grupo-Carrera</a>
                        //</li>
                    </ul>
                </div>
            </div>
        </nav>

        <br><br><br>

        <h3>entradas</h3>
        <h5>entradas</h5>
        <hr><br>
        <form action="{{route('entrada_registrar')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>entradas</h3>

            <div class="input-group mb-3">
                <select class="form-select" name="id_entrada" id="id_entrada">
                    <option selected>Selecciona una Opción...</option>
                    @foreach($entradas as $entrada)
                    <option value="{{$entrada->id_entrada}}">{{ $entrada->numero }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_entrada">Entradas</label>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" name="id_producto" id="id_producto">
                    <option selected>Selecciona una Opción...</option>
                    @foreach($productos as $producto)
                    <option value="{{$producto->id_producto }}">{{ $producto->numero }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_producto">productos</label>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" name="id_proveedor" id="id_proveedor">
                    <option selected>Selecciona una Opción...</option>
                    @foreach($proveedores as $proveedor)
                    <option value="{{$proveedor->id_proveedor }}">{{ $proveedor->numero }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_proveedor">proveedor</label>
            </div>

            <div class="input-group mb-3">  
                <select class="form-select" name="caducidad" id="caducidad">
                    <option selected>Selecciona una Opción...</option>
                    <option value="Coca-cola">Coca-cola</option>
                    <option value="Papas">Papas</option>
                    <option value="Galletas">Galletas</option>
                    <option value="Dulces artesanales">Dulces artesanales</option>
                    <option value="Gomitas">Gomitas</option>
                    <option value="Atun">Atun</option>
                    <option value="Huevo">Huevo</option>
                    <option value="Crema">Crema</option>
                    <option value="Leche">Leche</option>
                    <option value="Agua">Agua</option>
                    <option value="Queso">Queso</option>
                </select>
                <label class="input-group-text" for="caducidad">caducidad</label>
            </div>
            <hr><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <br><br><br>

        <h1>Lista de Asignaciones de Alumnos - Grupos</h1>
        <br>
        <hr>
        <table class="table">
            <tr>
                <th>N°</th>
                <th>caducidad</th>
                <th>producto</th>
                <th>entrada</th>
                <th>proveedor</th>
                <th>Acciones</th>
            </tr>
            @foreach ($entradas as $entrada)
            <tr>
                <td>{{ $entrada->id_entrada }}</td>
                <td>{{ $entrada->caducidad }}</td>
                <td>{{ $entrada->productos->numero }}</td>
                <td>{{ $entrada->proveedor->numero }}</td>
                <td>
                    <a href="{{route('entrada_borrar',['id' => $entradas -> id_entrada])}}">
                        <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar el registro?')">
                            Borrar
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>

        <h1>Lista de entrada (2)</h1>
        <br><hr>
        <table class="table">
            <tr>
                <th>#</th>
                <th>N° Registro</th>
                <th>caducidad</th>
                <th>clave</th>
                <th>producto</th>
                <th>proveedor</th>
                <th>Otros</th>
            </tr>
            @foreach($datos as $key => $datos)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $dato->id }}</td>
                    <td>{{ $dato->caducidad }}</td>
                    <td>{{ $dato->clave }}</td>
                    <td>{{ $dato->producto }}</td>
                    <td>{{ $dato->entrada }}</td>
                    <td>
                        <a href="{{ route('entrada_borrar',['id' => $dato->id]) }}">
                            <button type="button" class="btn btn-primary btn-sm" onclick="return confirm('Seguro que desea borrar el registro?')">
                                Borrar
                            </button>
                        </a> 
                    </td>
                </tr>
            @endforeach
        </table>
        <br><hr><br>
            
        <br><br><br>
    </div>
        
    <script>
        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
</body>

</html>
