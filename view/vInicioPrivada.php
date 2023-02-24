<link rel="stylesheet" href="./webroot/style/inicioPrivado.css">
<form method="./programa.php" id="menu" method="post">
    <input type="submit" class="itemMenu" name="boton" value="detalles">
    <input type="submit" class="itemMenu" name="boton" value="mantenimiento">
    <input type="submit" class="itemMenu" name="boton" value="rest">
    <input type="submit" class="itemMenu" name="boton" value="error">
    <input type="submit" class="itemMenu" name="boton" value="editar">
    <input type="submit" class="itemMenu" name="boton" value="salir">
</form>
<section>
    <h2><?php echo $aRespuestaInicioPrivado['idioma']?></h2>
    <h3><?php echo $aRespuestaInicioPrivado['descripcionUsuario']?></h3>
        <div>
            <p>
            <?php echo $aRespuestaInicioPrivado['mensajeNumConexiones']; ?>
            </p>
        </div>
</section>