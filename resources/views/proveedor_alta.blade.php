<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Proveedores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pN1yT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/alta.css') }}">
</head>
<body>
    <div class="container">
        
        <h3>Nuevo Registro de Proveedores</h3>
        <h5>CRUD: Proveedores -> Proveedores</h5>
        <hr><br>

        <form action="{{ route('proveedor_registrar') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

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

            <!-- Campo Activo añadido -->
            <div class="form-floating mb-3">
                <select class="form-control" name="activo" id="floatingActivo">
                    <option value="1" {{ old('activo') == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('activo') == 0 ? 'selected' : '' }}>No</option>
                </select>
                <label for="floatingActivo">Activo</label>
                <div id="ActivoHelp" class="form-text">
                    @if($errors->first('activo'))
                        <i>El campo activo no es correcto!!</i>
                    @endif
                </div>
            </div>

            <hr><br>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-danger">Guardar</button>
            </div>
        </form>

        <br><br><br>
    </div>
</body>
</html>
