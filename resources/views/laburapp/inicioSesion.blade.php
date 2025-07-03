<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <title>@section('titulo','Inicio de sesión')</title>
    <meta name="description" content="Trabajos y emprendimientos">
    <meta name="keywords" content="Trabajo, empleo, rubro, emprendimiento, laburo">
</head>
<body>
    <header class="texto-inicio-sesion">
        <h1>Inicio de Sesión</h1>
    </header>
    <main>
        <div class="centrar">
            <form name="logueo" method="post" action="login.php" class="cuadro-inicio-sesion">
                Email <br> 
                <input type="email" placeholder="Ingrese email..." name="mail" required autofocus> 
                <br> <br>
                Contraseña <br>
                <div class="input-row">
                    <input id="pass" type="password" placeholder="Contraseña..." name="pass" minlength="4" maxlength="10" required>
                    <p class="eye">
                        <img src="./imagenes/ojo-cerrado.png" alt="Mostrar contraseña">
                    </p>
                </div>
                <br> <br>
                <input class="btn-busqueda" type="submit" value="Iniciar Sesión">
                <br> <br>
                <a href="registro_usuario.php"><h4>¿No tenés cuenta? REGISTRATE ACÁ</h4></a> 
                <a href="index.php"><h4>Volver</h4></a>
            </form>
        </div>
    </main> 
    <footer> 
        <h3 id="derecho"></h3>
        <a target="_blank" href="https://www.whatsapp.com/?lang=es_LA"><img class="btn-wsp" src="./imagenes/wsp.png" alt="Logo de wsp"> </a>
    </footer>
</body>

</html>