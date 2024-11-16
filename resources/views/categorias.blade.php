<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br><br>
        <h3>Lista de categorias  </h3>
        <h5>CRUD:Categoria</h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{route('categoria_alta')}}">
                <button type="button" class="btn btn-info">Nuevo registro de categoria</button>
            </a>
        </p>
        <br><br>
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Otros</th>
            </tr>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{$categoria->id_categoria}}</td>
                <td>{{$categoria->nombre}}</td>
                <td>{{$categoria->tipo}}</td>
                <td>
                    <a href="{{route('categoria_detalle',['id' =>$categoria->id_categoria])}}">
                        <button type="button" class="btn btn-info btn-sm">Detalle</button>
                    </a>
                    <a href="{{route('categoria_editar',['id' =>$categoria->id_categoria])}}">
                        <button type="button" class="btn btn-info btn-sm">Editar</button>
                    </a>  <a href="{{route('categoria_borrar',['id' =>$categoria->id_categoria])}}">
                        <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $categorias->links('pagination::bootstrap-5') }}
        <div class="pagination pagination-sm">
    </div>
</body>
</html>