<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de descuentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br><br>
        <h3>Lista de descuento  </h3>
        <h5>CRUD:descuentos</h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{route('descuento_alta')}}">
                <button type="button" class="btn btn-info">Nuevo registro de descuentos</button>
            </a>
        </p>
        <br><br>
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>descuento</th>
                <th>cantidad</th>
                <th>activo</th>
                <th>Otros</th>
            </tr>
            @foreach ($descuentos as $descuento)
            <tr>
                <td>{{$descuento->id_descuento}}</td>
                <td>{{$descuento->nombre}}</td>
                <td>{{$descuento->descuento}}</td>
                <td>{{$descuento->cantidad}}</td>
                <td>{{$descuento->activo}}</td>
                <td>{{$descuento->tipo}}</td>

                <td>
                    <a href="{{route('descuento_detalle',['id' =>$descuento->id_descuento])}}">
                        <button type="button" class="btn btn-info btn-sm">Detalle</button>
                    </a>
                    <a href="{{route('descuento_editar',['id' =>$descuento->id_descuento])}}">
                        <button type="button" class="btn btn-info btn-sm">Editar</button>
                    </a>  <a href="{{route('descuento_borrar',['id' =>$descuento->id_descuento])}}">
                        <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>