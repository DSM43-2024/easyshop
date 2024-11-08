<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Editar ubicacion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3>Editar ubicacion</h3>
        <h5>CRUD: ubicacion -> Editor</h5>
        <hr>
        <br>
        <form action="{{ route('ubicacion_salvar', ['id' => $ubicacion->id_ubicacion]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h3>Datos de la categoria</h3>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="estante" value="{{ $ubicacion->estante }}" id="floatingestante" placeholder="Ejemplo:Limpieza" aria-describedby="estanteHelp">
                <label for="floatingestante">estante</label>
                <div id="estanteHelp" class="form-text">
                    @if ($errors->first('estante'))<i>El campo estante no es correcto</i>@endif
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="pasillo" value="{{ $ubicacion->pasillo }}" id="floatingpasillo" placeholder="Ejemplo:Cleaning" aria-describedby="pasilloHelp">
                <label for="floatingpasillo">pasillo</label>
                <div id="pasilloHelp" class="form-text">
                    @if ($errors->first('pasillo'))<i>El campo pasillo no es correcto</i>@endif
                </div>
            </div>

            
            <hr>
            <button type="submit" class="btn btn-info">Guardar</button>
            <a href="{{ route('ubicacion') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>
