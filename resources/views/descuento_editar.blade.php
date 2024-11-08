<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Editar descuento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3>Editar descuento</h3>
        <h5>CRUD: descuento -> Editor</h5>
        <hr>
        <br>
        <form action="{{ route('descuento_salvar', ['id' => $descuento->id_descuento]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h3>Datos de descuento</h3>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ $descuento->nombre }}" id="floatingnombre" placeholder="Ejemplo:Limpieza" aria-describedby="nombreHelp">
                <label for="floatingnombre">descuento</label>
                <div id="nombreHelp" class="form-text">
                    @if ($errors->first('nombre'))<i>El campo nombre no es correcto</i>@endif
                </div>

            </div>
        

              </div>
             <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cantidad" value="{{ $descuento->cantidad }}" id="floatingcantidad" placeholder="Ejemplo:Limpieza" aria-describedby="cantidadHelp">
                <label for="floaticantidad">cantidad</label>
                <div id="cantidadHelp" class="form-text">
                    @if ($errors->first('cantidad'))<i>El campo cantidad no es correcto</i>@endif
                </div>
            </div>

                  </div>
             <div class="form-floating mb-3">
                <input type="text" class="form-control" name="activo" value="{{ $descuento->activo }}" id="floatingactivo" placeholder="Ejemplo:Limpieza" aria-describedby="activoHelp">
                <label for="floatiactivo">activo</label>
                <div id="activoHelp" class="form-text">
                    @if ($errors->first('activo'))<i>El campo activo no es correcto</i>@endif
                </div>
            </div>

            <hr>
            <button type="submit" class="btn btn-info">Guardar</button>
            <a href="{{ route('descuentos') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>
