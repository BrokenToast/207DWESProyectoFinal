<link rel="stylesheet" href="./webroot/style/cambiarContrasena.css">
<section>
    <div class="encabezadoMain">
        <h2>Cambiar Contraseña</h2>
        <form action="index.php" method="post">
            <input type="submit" class="button" name="volver" value="volver">
        </form>
    </div>
    <article>
        <form action="./index.php" method="post">
            <fieldset>
                <legend>Cambiar Contraseña</legend>
                    <div>
                        <label for="nowPassword">Introduce la contraseña actual:</label>
                        <input type="password" name="nowPassword" id="nowPassword">
                    </div>
                    <div>
                        <label for="newPassword">Nueva contraseña:</label>
                        <input type="password" name="newPassword" id="newPassword">
                    </div>
                    <div>
                        <label for="repitPassword">Repita la contraseña:</label>
                        <input type="password" name="repitPassword" id="repitPassword">
                    </div>
                    <div id="errores">
                        <?php
                            foreach($aErrores as $error){
                                ?> 
                                <p class="error">
                                    <?php echo $error;?>
                                </p>
                                <?php
                            }
                        ?>
                    </div>
                    <div><input type="submit" class="button" name="cambiar" value="Cambiar Contraseña"></div>
                </table>
            </fieldset>
        </form>
    </article>
</section>