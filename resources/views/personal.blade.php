<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br><br>
        <h3>Lista de personal  </h3>
        <h5><CRUD:personal></CRUD:persona></h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{route('personal_alta')}}">
                <button type="button" class="btn btn-info">Nuevo registro de personal</button>
            </a>
        </p>
        <br><br>
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>activo</th>
                <th>Otros</th>
            </tr>
            @foreach ($personal as $personal)
            <tr>
                <td>{{$personal->id_personal}}</td>
                <td>{{$personal->nombre}}</td>
                <td>{{$personal->tipo}}</td>
                <td>{{$personal->activo}}</td>

                <td>
                    <a href="{{route('personal_detalle',['id' =>$personal->id_personal])}}">
                        <button type="button" class="btn btn-info btn-sm">Detalle</button>
                    </a>
                    <a href="{{route('personal_editar',['id' =>$personal->id_personal])}}">
                        <button type="button" class="btn btn-info btn-sm">Editar</button>
                    </a>  <a href="{{route('personal_borrar',['id' =>$personal->id_personal])}}">
                        <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>