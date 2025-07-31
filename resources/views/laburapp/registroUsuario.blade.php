
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@section('titulo','Registro de usuario')</title>
</head>
<body>

        <div class="centrar">
        <h1> Registro de Usuario </h1>
    <div>
    </div>
        <form class="cuadro-inicio-sesion" method="POST" action="{{ route('registro.guardar') }}" enctype="multipart/form-data">
        @csrf
            <div class='contenedor-input'>
                <h3>Foto de perfil</h3><h6>Solo imagenes tipo "jpg/jpeg"</h6> <input type="file" name="imagen" >
            </div>
            <div class='contenedor-input'>
                <h3>Nombre</h3> <input type="text" placeholder="Ingrese su nombre..." name="nombre" id="nombre"  required autofocus>
            </div>
            <div class='contenedor-input'>
                <h3>Apellido</h3> <input type="text" placeholder="Ingrese su apellido..." name="apellido" required autofocus> 
            </div>
            <div class='contenedor-input'>
                <h3>Contraseña</h3> <input type="password" placeholder="Contraseña..." name="pass" id="pass" minlength="4" maxlength="10" required>
                <p class="eye"><img src="./imagenes/ojo-cerrado.png" alt="Ojo cerrado"></p>
            </div>
            <div class='contenedor-input'>
                <h3>Correo Electrónico</h3> <input type="email" placeholder="Ingrese su Correo Electrónico..." id="mail" name="mail" minlength="11" required> 
            </div>
            <div class='contenedor-input'>
                <h3>Teléfono o Celular</h3> <input type="tel" placeholder="Ingrese su Número de Teléfono..." name="telefono" required> 
            </div>
            <div class='contenedor-input'>
                <h3>Seleccionar localidad</h3> 
            <select name="localidad" required>    
            <option value="" selected disabled>Seleccionar Localidad</option>
            @foreach ($localidades as $localidad)
                <option value="{{ $localidad->id_localidad }}">{{ $localidad->nombre_localidad }}</option>
            @endforeach
            </select>   
            </div>
            <input class="btn-busqueda" type="submit" value="Crear usuario">
            <br>
                <a href="{{ url('index') }}"><h4>Volver al inicio</h4></a>
        </form>

</body>
</html>