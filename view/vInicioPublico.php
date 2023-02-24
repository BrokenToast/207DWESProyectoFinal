<link rel="stylesheet" href="./webroot/style/inicioPublico.css">
<nav>
    <!--<label for="banderaIdiomas">⚐</label>
    <input type="checkbox" name="bandera" id="banderaIdiomas">
     <div id="selectLenguage">
        <form action="./index.php" method="post">
            <input type="radio" name="idioma" id="es" value="es" checked>
            <label for="es" class="bandera"><img src="./webroot/media/img/banderas/espana.png" alt="es"></label>
            <input type="radio" name="idioma" id="ct" value="ct">
            <label for="ct" class="bandera"><img src="./webroot/media/img/banderas/cataluna.png" alt="ct"></label>
            <input type="radio" name="idioma" id="gl" value="gl">
            <label for="gl" class="bandera"><img src="./webroot/media/img/banderas/galicia.png" alt="gl"></label>
            <input type="radio" name="idioma" id="py" value="py">
            <label for="pt" class="bandera"><img src="./webroot/media/img/banderas/portuges.png" alt="pt"></label>
            <input type="submit" name="guardaridioma" value="guardar">
        </form>
    </div> -->
    <form id="login" action="./index.php" method="post">
        <input type="submit" name="login" value="Login">
    </form>
</nav>
<section>
    <article id="carrusel">
        <button id="atras" class="movimiento"><</button>
        <a href="" id="enlace" target="_blank"></a>
        <button id="delante" class="movimiento">></button>
    </article>
    <article id="reloj">
    </article>
</section>

<script defer src="./webroot/javascript/inicioPublico.js"></script>
<script defer src="./webroot/javascript/reloj.js"></script>