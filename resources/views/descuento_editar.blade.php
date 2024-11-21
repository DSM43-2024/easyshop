<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar descuento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/de.css') }}">
</head>
<body>
    <div class="container">
        <h3 class="text-center text-white">Editar descuento</h3>
        <h5 class="text-center text-white">CRUD: descuento -> Editor</h5>
        <hr class="bg-white">
        
        <form action="{{ route('descuento_salvar', ['id' => $descuento->id_descuento]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h4 class="text-white">Datos de descuento</h4>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ $descuento->nombre }}" id="floatingnombre" placeholder="Ejemplo:Limpieza" aria-describedby="nombreHelp">
                <label for="floatingnombre">Descuento</label>
                <div id="nombreHelp" class="form-text text-white">
                    @if ($errors->first('nombre'))<i>El campo nombre no es correcto</i>@endif
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cantidad" value="{{ $descuento->cantidad }}" id="floatingcantidad" placeholder="Ejemplo: 10%" aria-describedby="cantidadHelp">
                <label for="floatingcantidad">Cantidad</label>
                <div id="cantidadHelp" class="form-text text-white">
                    @if ($errors->first('cantidad'))<i>El campo cantidad no es correcto</i>@endif
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="activo" value="{{ $descuento->activo }}" id="floatingactivo" placeholder="Ejemplo: Sí/No" aria-describedby="activoHelp">
                <label for="floatingactivo">Activo</label>
                <div id="activoHelp" class="form-text text-white">
                    @if ($errors->first('activo'))<i>El campo activo no es correcto</i>@endif
                </div>
            </div>

            <hr class="bg-white">

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-info">Guardar</button>
                <a href="{{ route('descuentos') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
