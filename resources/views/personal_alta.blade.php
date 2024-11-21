<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Nuevo registro de personal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/alta.css') }}">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <h1>Nuevo registro de personal</h1>
        <h5>CRUD: Personal -> Registro</h5>
        <hr>
        <br>
        <form action="{{ route('personal_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Datos</h3>

            <!-- Campo Nombre -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingNombre" placeholder="ejemplo: Juan Pérez" aria-describedby="nombreHelp">
                <label for="floatingNombre">Nombre</label>
                <div id="nombreHelp" class="form-text">
                    @if ($errors->first('nombre'))
                        <i>El campo nombre no es correcto</i>
                    @endif
                </div>
            </div>
            
            <!-- Campo Tipo -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="tipo" value="{{ old('tipo') }}" id="floatingTipo" placeholder="ejemplo: Admin" aria-describedby="tipoHelp">
                <label for="floatingTipo">Tipo</label>
                <div id="tipoHelp" class="form-text">
                    @if ($errors->first('tipo'))
                        <i>El campo tipo no es correcto</i>
                    @endif
                </div>
            </div>

            <!-- Campo Activo -->
            <div class="form-group">
                <label for="activo">Activo</label>
                <select class="form-control" id="activo" name="activo">
                    <option value="1" {{ old('activo') == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('activo') == '0' ? 'selected' : '' }}>No</option>
                </select>
                <div id="activoHelp" class="form-text">
                    @if ($errors->first('activo'))
                        <i>El campo activo no es correcto</i>
                    @endif
                </div>
            </div>

            <hr>
            <button type="submit" class="btn btn-danger">Guardar</button>
            <a href="{{ route('personal') }}" class="btn btn-info">Cancelar</a>
        </form>
    </div>
</body>
</html>
