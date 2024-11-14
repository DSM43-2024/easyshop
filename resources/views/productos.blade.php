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
                            <a class="nav-link" href="{{route('productos')}}">productos</a>//id_producto-
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categorias')}}">categorias</a>//id_categoria-
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('descuentos')}}">descuentos</a>//id_proveedor-
                        </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('ubicacion')}}">ubicacion</a>//id_ubicacion-
                        </li>
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
        <form action="{{route('producto_registrar')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>entradas</h3>

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
                <select class="form-select" name="id_categoria" id="id_categoria">
                    <option selected>Selecciona una Opción...</option>
                    @foreach($catagorias as $catagoria)
                    <option value="{{$categoria->id_categoria}}">{{ $catagoria->numero }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_catagoria">catagorias</label>
            </div>


            <div class="input-group mb-3">
                <select class="form-select" name="id_descuento" id="id_descuento">
                    <option selected>Selecciona una Opción...</option>
                    @foreach($descuentos as $descuento)
                    <option value="{{$descuento->id_descuento }}">{{ $descuento->numero }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_descuento">descuento</label>
            </div>

                <div class="input-group mb-3">
                <select class="form-select" name="id_ubicacion" id="id_ubicacion">
                    <option selected>Selecciona una Opción...</option>
                    @foreach($ubicacion as $ubicacion)
                    <option value="{{$ubicacion->id_ubicacion }}">{{ $ubicacion->numero }}</option>
                    @endforeach
                </select>
                <label class="input-group-text" for="id_ubicacion">ubicacion</label>
            </div>

            <div class="input-group mb-3">  
                <select class="form-select" name="tipo" id="tipo">
                    <option selected>Selecciona una Opción...</option>
                    <option value="alimentos">alimentos</option>
                    <option value="bebidas">bebidas</option>
                    <option value="otros">otros</option>

                </select>
                <label class="input-group-text" for="tipo">tipo</label>
            </div>
            <hr><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <br><br><br>

        <h1>Lista de productos</h1>
        <br>
        <hr>
        <table class="table">
            <tr>
                <th>N°</th>
                <th>tipo</th>
                <th>producto</th>
                <th>categoria</th>
                <th>descuento</th>
                <th>ubicacion</th>
                <th>Acciones</th>
            </tr>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id_producto }}</td>
                <td>{{ $producto->tipo }}</td>
                <td>{{ $producto->categoria->numero }}</td>
                <td>{{ $producto->descuento->numero }}</td>
                <td>{{ $producto->ubicacion->numero }}</td>

                <td>
                    <a href="{{route('producto_borrar',['id' => $productos -> id_producto])}}">
                        <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar el registro?')">
                            Borrar
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>

        <h1>Lista de producto (2)</h1>
        <br><hr>
        <table class="table">
            <tr>
                <th>#</th>
                <th>N° Registro</th>
                <th>tipo</th>
                <th>clave</th>
                <th>categoria</th>
                <th>descuento</th>
                 <th>ubicacion</th>
                <th>Otros</th>
            </tr>
            @foreach($datos as $key => $datos)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $dato->id }}</td>
                    <td>{{ $dato->tipo }}</td>
                    <td>{{ $dato->clave }}</td>
                    <td>{{ $dato->catagoria }}</td>
                    <td>{{ $dato->descuento }}</td>
                    <td>{{ $dato->ubicacion }}</td>

                    <td>
                        <a href="{{ route('producto_borrar',['id' => $dato->id]) }}">
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
