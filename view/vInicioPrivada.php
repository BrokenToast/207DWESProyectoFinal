<link rel="stylesheet" href="./webroot/style/inicioPrivado.css">
<form method="./programa.php" id="menu" method="post">
    <input type="submit" class="itemMenu" name="detalles" value="Detalles">
    <input type="submit" class="itemMenu" name="mantenimiento" value="Mantenimiento Departamento">
    <input type="submit" class="itemMenu" name="editar" value="Editar Perfil">
    <input type="submit" class="itemMenu" name="error" value="Error">
    <input type="submit" class="itemMenu" name="salir" value="Salir">
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