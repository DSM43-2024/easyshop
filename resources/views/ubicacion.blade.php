<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de ubicacion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br><br>
        <h3>Lista de ubicacion  </h3>
        <h5>CRUD:ubicacion</h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{route('ubicacion_alta')}}">
                <button type="button" class="btn btn-info">Nuevo registro de ubicacion</button>
            </a>
        </p>
        <br><br>
        <table class="table">
            <tr>
                <th>estante</th>
                <th>pasillo</th>
                <th>Otros</th>
            </tr>
            @foreach ($ubicacion as $ubicacion)
            <tr>
                <td>{{$ubicacion->id_ubicacion}}</td>
                <td>{{$ubicacion->estante}}</td>
                <td>{{$ubicacion->pasillo}}</td>
                <td>
                    <a href="{{route('ubicacion_detalle',['id' =>$ubicacion->id_ubicacion])}}">
                        <button type="button" class="btn btn-info btn-sm">Detalle</button>
                    </a>
                    <a href="{{route('ubicacion_editar',['id' =>$ubicacion->id_ubicacion])}}">
                        <button type="button" class="btn btn-info btn-sm">Editar</button>
                    </a>  <a href="{{route('ubicacion_borrar',['id' =>$ubicacion->id_ubicacion])}}">
                        <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>