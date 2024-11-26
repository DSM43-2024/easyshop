<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Editar Proveedor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/editar.css') }}">
</head>
<body>
    <div class="container">
        <h3>Editar Proveedor</h3>
        <h5>CRUD: Proveedores -> Editor</h5>
        <hr>
        <br>
        <form action="{{ route('proveedor_salvar', ['id' => $proveedor->id_proveedor]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h3>Datos del Proveedor</h3>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ $proveedor->nombre }}" id="floatingnombre" placeholder="Ejemplo: Nombre del proveedor" aria-describedby="nombreHelp">
                <label for="floatingnombre">Nombre</label>
                <div id="nombreHelp" class="form-text">
                    @if ($errors->first('nombre'))<i>El campo nombre no es correcto</i>@endif
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ $proveedor->email }}" id="floatingemail" placeholder="Ejemplo: proveedor@example.com" aria-describedby="emailHelp">
                <label for="floatingemail">Email</label>
                <div id="emailHelp" class="form-text">
                    @if ($errors->first('email'))<i>El campo email no es correcto</i>@endif
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="created_at" value="{{ $proveedor->created_at }}" id="floatingcreated_at" placeholder="Ejemplo: 2021-05-25" aria-describedby="created_atHelp">
                <label for="floatingcreated_at">Fecha de Creación</label>
                <div id="created_atHelp" class="form-text">
                    @if ($errors->first('created_at'))<i>La fecha de creación no es correcta</i>@endif
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="updated_at" value="{{ $proveedor->updated_at }}" id="floatingupdated_at" placeholder="Ejemplo: 2021-06-01" aria-describedby="updated_atHelp">
                <label for="floatingupdated_at">Fecha de Actualización</label>
                <div id="updated_atHelp" class="form-text">
                    @if ($errors->first('updated_at'))<i>La fecha de actualización no es correcta</i>@endif
                </div>
            </div>

            <!-- Campo Activo añadido -->
            <div class="form-floating mb-3">
                <select class="form-control" name="activo" id="floatingactivo">
                    <option value="1" {{ $proveedor->activo == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ $proveedor->activo == 0 ? 'selected' : '' }}>No</option>
                </select>
                <label for="floatingactivo">Activo</label>
                <div id="activoHelp" class="form-text">
                    @if ($errors->first('activo'))<i>El campo activo no es correcto</i>@endif
                </div>
            </div>

            <hr>
            <button type="submit" class="btn btn-info">Guardar</button>
            <a href="{{ route('proveedores') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>
