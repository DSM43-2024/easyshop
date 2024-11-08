<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Proveedores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pN1yT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>

    <style>
        .container {
            margin-top: 30px;
        }
        h3, h5 {
            color: #4b0082; /* Morado */
        }
        .btn-primary {
            background-color: #28a745 !important; /* Botones verdes */
            border-color: #28a745 !important;
        }
        .btn-danger {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Nuevo Registro de Proveedores</h3>
        <h5>CRUD: Proveedores -> Proveedores</h5>
        <hr><br>

        <!-- Formulario para registro de alumnos -->
        <form action="{{ route('proveedor_registrar') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- Campo para el nombre del alumno -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingNombre" placeholder="Ejemplo: Juanito Canasta">
                <label for="floatingNombre">Nombre del proveedor</label>
                <div id="NombreHelp" class="form-text">
                    @if($errors->first('nombre'))
                        <i>El campo nombre no es correcto!!</i>
                    @endif
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="floatingEmail" placeholder="Ejemplo: goloso@gmail.com">
                <label for="floatingEmail">E-Mail</label>
                <div id="EmailHelp" class="form-text">
                    @if($errors->first('email'))
                        <i>El campo email no es correcto!!</i>
                    @endif
                </div>
            </div>


            <hr><br>

            <!-- Botón de guardar -->
            <button type="submit" class="btn btn-primary">Guardar</button>

            <!-- Botones de cancelar y regresar -->
            <a href="{{ route('proveedores') }}" class="btn btn-danger">Cancelar</a>
            <a href="{{ route('proveedores') }}" class="btn btn-danger">Regresar</a>
        </form>

        <br><br><br>
    </div>
</body>
</html>
