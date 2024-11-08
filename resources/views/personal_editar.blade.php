<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Editar personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3>Editar personal</h3>
        <h5>CRUD: personal -> Editor</h5>
        <hr>
        <br>
        <form action="{{ route('personal_salvar', ['id' => $personal->id_personal]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h3>Datos del personal</h3>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="tipo" value="{{ $personal->tipo }}" id="floatingtipo" placeholder="Ejemplo:tipo" aria-describedby="nombreHelp">
                <label for="floatingtipo">tipo</label>
                <div id="tipoHelp" class="form-text">
                    @if ($errors->first('tipo'))<i>El campo tipo no es correcto</i>@endif
                </div>
            </div>
                  <div class="form-floating mb-3">
                <input type="text" class="form-control" name="activo" value="{{ $personal->activo }}" id="floatingactivo" placeholder="Ejemplo:si no" aria-describedby="activoHelp">
                <label for="floatingactivo">activo</label>
                <div id="activoHelp" class="form-text">
                    @if ($errors->first('activo'))<i>El campo activo no es correcto</i>@endif
                </div>
            </div>

            
            <hr>
            <button type="submit" class="btn btn-info">Guardar</button>
            <a href="{{ route('personal') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>