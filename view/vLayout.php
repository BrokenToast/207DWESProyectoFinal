<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="././webroot/style/reset.css">
    <link rel="stylesheet" href="./webroot/style/variables.css">
    <link rel="stylesheet" href="./webroot/style/base.css">
    <title>LoginLogoff</title>
</head>
<body>
    <div id="root">
        <header>
            <img src="./webroot/media/img/logo_temporal_development_Toast.png" alt="Tostada">
            <h1>LoginLogoff</h1>
        </header>
        <main>
        <?php 
            require_once $aVista[$_SESSION['paginaEnCurso']];
        ?>
        </main>
        <footer>
            <p>Luis Pérez Astorga® 2022-2023</p>
            <a href="../../index.html"><img src="./webroot/media/img/logo_Casa.png" alt="Pagina Creador" height="50" width="50"></a>
            <p>Pagina a Copiar:<a href="https://www.raspberrypi.com/" target="_blank">Raspberry Pi</a></p>
            <a href="https://github.com/BrokenToast/207DWESProyectoFinal" target="_blank"><img src="./webroot/media/img/git.png" alt="GitHub" height="50" width="50"></a>        
        </footer>
    </div>
</body>
</html>