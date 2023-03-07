<link rel="stylesheet" href="./webroot/style/cambiarContrasena.css">
<section>
    <div class="encabezadoMain">
        <h2>Borrar Usuario</h2>
        <form action="./index.php" method="post">
            <input type="submit" class="button" name="volver" value="volver">
        </form>
    </div>
    <article>
        <form action="index.php" method="post">
            <fieldset>
                <legend>Eliminar Usuario</legend>
                <div>
                    <label for="nowpassword">Introduce la conseña</label>
                    <input type="password" name="nowPassword" id="nowpassword">
                </div>
                <div>
                    <label for="repetpassword">Repite la contraseña</label>
                    <input type="password" name="repetPassword" id="repetpassword">
                </div>
                <div class="errores">
                    <?php
                    if(!empty($aErrores)){
                        foreach ($aErrores as $error) {
                            ?> 
                            <p class="textError"><?php echo $error;?></p>
                            <?php
                        }
                    }
                    ?>
                </div>
                <button type="submit" name="eliminar" class="button">Eliminar cuenta</button>
            </fieldset>
        </form>
    </article>
</section>