<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Nuevo registro de ubicacion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <h3>Nuevo registro de ubicacion</h3>
        <h5>Crud:ubicacion->Registro</h5>
        <hr>
        <br>
        <form action="{{route('ubicacion_registrar')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Datos</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="estante" value="{{ old('estante') }}" id="floatingestante" placeholder="ejemplo=estante" aria-describedby="estanteHelp">
                <label for="floatingestante">estante</label>
                <div id="estanteHelp" class="form-text">@if($errors->first('estante'))<i>El campo estante no es correcto</i>@endif</div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="pasillo" value="{{ old('pasillo') }}" id="floatingpasillo" placeholder="ejemplo=pasillo" aria-describedby="pasilloHelp">
                <label for="floatingpasillo">pasillo</label>
                <div id="tipoHelp" class="form-text">@if($errors->first('pasillo'))<i>El campo pasillo no es correcto</i>@endif</div>
            </div>

            <hr><hr>
            <button type="submit" class="btn btn-danger">Guardar</button>
            <a href="{{route('ubicacion')}}">
                <button type="button" class="btn btn-info">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>
