<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Nuevo registro de personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <h3>Nuevo registro de personal</h3>
        <h5>Crud:personal->Registro</h5>
        <hr>
        <br>
        <form action="{{route('personal_registrar')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Datos</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="tipo" value="{{ old('tipo') }}" id="floatingtipo" placeholder="ejemplo=Admin" aria-describedby="tipoHelp">
                <label for="floatingtipo">tipo</label>
                <div id="tipoHelp" class="form-text">@if($errors->first('tipo'))<i>El campo tipo no es correcto</i>@endif</div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="activo" value="{{ old('activo') }}" id="floatingactivo" placeholder="" aria-describedby="activoHelp">
                <label for="floatingactivo">activo</label>
                <div id="activoHelp" class="form-text">@if($errors->first('activo'))<i>El campo activo no es correcto</i>@endif</div>
            </div>

            

            <hr><hr>
            <button type="submit" class="btn btn-danger">Guardar</button>
            <a href="{{route('personal')}}">
                <button type="button" class="btn btn-info">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>
