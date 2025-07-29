<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <title>Inicio de sesión</title>
    <meta name="description" content="Trabajos y emprendimientos">
    <meta name="keywords" content="Trabajo, empleo, rubro, emprendimiento, laburo">
</head>
<body>
@if (session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif
    <header class="texto-inicio-sesion">
        <h1>Inicio de Sesión</h1>
    </header>
    <main>
        <div class="centrar">
            <form name="logueo" method="post" action="{{ route('inicioSesion.usuario') }}" class="cuadro-inicio-sesion">
                @csrf
                @if($errors->has('inicioSesion'))
                    <div class="error">{{ $errors->first('inicioSesion') }}</div>
                @endif
                Email <br> 
                <input type="email" placeholder="Ingrese email..." name="mail" required autofocus> 
                <br> <br>
                Contraseña <br>
                <div class="input-row">
                    <input id="pass" type="password" placeholder="Contraseña..." name="pass" minlength="4" maxlength="10" required>
                    <p class="eye">
                        <img src="{{ asset('imagenes/ojo-cerrado.png') }}" alt="Mostrar contraseña">
                    </p>
                </div>
                <br> <br>
                <input class="btn-busqueda" type="submit" value="Iniciar Sesión">
                <br> <br>
                <a href="{{ url('registroUsuario') }}"><h4>¿No tenés cuenta? REGISTRATE ACÁ</h4></a> 
                <a href="{{ url('index') }}"><h4>Volver</h4></a>
            </form>
        </div>
    </main> 
    <footer> 
        <h3 id="derecho"></h3>
        <a target="_blank" href="https://www.whatsapp.com/?lang=es_LA"><img class="btn-wsp" src="{{ asset('imagenes/wsp.png') }}" alt="Logo de wsp"> </a>
    </footer>
</body>
</html>