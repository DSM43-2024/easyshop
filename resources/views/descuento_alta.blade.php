<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Nuevo registro de descuentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/alta.css') }}">
</head>
<body>
    
    <div class="container">
        <h3>Nuevo registro de descuentos</h3>
        <h5>Crud:descuentos->Registro</h5>
        <hr>
        <br>
        <form action="{{route('descuento_registrar')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Datos</h3>
          <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingnombre" placeholder="ejemplo=Limpieza" aria-describedby="nombreHelp">
                <label for="floatingnombre">nombre</label>
                <div id="nombreHelp" class="form-text">@if($errors->first('nombre'))<i>El campo nombre no es correcto</i>@endif</div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="descuento" value="{{ old('descuento') }}" id="floatingdescuento" placeholder="" aria-describedby="descuentoHelp">
                <label for="floatingdescuento">descuento</label>
                <div id="descuentoHelp" class="form-text">@if($errors->first('descuento'))<i>El campo descuento no es correcto</i>@endif</div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cantidad" value="{{ old('cantidad') }}" id="floatingcantidad" placeholder="" aria-describedby="cantidadHelp">
                <label for="floatingcantidad">cantidad</label>
                <div id="cantidadHelp" class="form-text">@if($errors->first('cantidad'))<i>El campo cantidad no es correcto</i>@endif</div>
            </div>

             <div class="form-floating mb-3">
                <input type="text" class="form-control" name="activo" value="{{ old('activo') }}" id="floatingactivo" placeholder="ejemplo=nuevo" aria-describedby="actvoHelp">
                <label for="floatingactivo">activo</label>
                <div id="activoHelp" class="form-text">@if($errors->first('activo'))<i>El campo activo no es correcto</i>@endif</div>
            </div>

            <hr><hr>
            <button type="submit" class="btn btn-danger">Guardar</button>
            <a href="{{route('descuentos')}}">
                <button type="button" class="btn btn-info">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>
