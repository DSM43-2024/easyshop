<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Nuevo registro de Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/alta.css') }}">
</head>
<body>
    
    <div class="container">
        <h3>Nuevo registro de Categoria</h3>
        <h5>Crud:Categoria->Registro</h5>
        <hr>
        <br>
        <form action="{{route('categoria_registrar')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Datos</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingnombre" placeholder="ejemplo=Limpieza" aria-describedby="nombreHelp">
                <label for="floatingnombre">Nombre</label>
                <div id="nombreHelp" class="form-text">@if($errors->first('nombre'))<i>El campo nombre no es correcto</i>@endif</div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="tipo" value="{{ old('tipo') }}" id="floatingtipo" placeholder="" aria-describedby="tipoHelp">
                <label for="floatingtipo">Tipo</label>
                <div id="tipoHelp" class="form-text">@if($errors->first('tipo'))<i>El campo tipo no es correcto</i>@endif</div>
            </div>

            

            <hr><hr>
            <button type="submit" class="btn btn-danger">Guardar</button>
            <a href="{{route('categorias')}}">
                <button type="button" class="btn btn-info">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>
