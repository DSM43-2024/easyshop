<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Editar Categorias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3>Editar Categorias</h3>
        <h5>CRUD: Categorias -> Editor</h5>
        <hr>
        <br>
        <form action="{{ route('categoria_salvar', ['id' => $categoria->id_categoria]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h3>Datos de la categoria</h3>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}" id="floatingnombre" placeholder="Ejemplo:Limpieza" aria-describedby="nombreHelp">
                <label for="floatingnombre">Categoria</label>
                <div id="nombreHelp" class="form-text">
                    @if ($errors->first('nombre'))<i>El campo nombre no es correcto</i>@endif
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ $categoria->tipo }}" id="floatingtipo" placeholder="Ejemplo:Cleaning" aria-describedby="nombreHelp">
                <label for="floatingtipo">Nombre</label>
                <div id="tipoHelp" class="form-text">
                    @if ($errors->first('tipo'))<i>El campo tipo no es correcto</i>@endif
                </div>
            </div>

            
            <hr>
            <button type="submit" class="btn btn-info">Guardar</button>
            <a href="{{ route('categorias') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>
