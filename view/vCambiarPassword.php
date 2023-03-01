<link rel="stylesheet" href="./webroot/style/cambiarContrasena.css">
<h2>Cambiar Contraseña</h2>
<section>
    <article>
        <form action="./index.php" method="post">
            <input type="submit" class="button" name="volver" value="volver">
            <fieldset>
                <legend>Cambiar Contraseña</legend>
                <table>
                    <tr>
                        <td>Nueva contraseña:</td>
                        <td>
                            <input type="password" name="newPassword" id="newPassword">
                        </td>
                    </tr>
                    <tr>
                        <td>Repita la contraseña</td>
                        <td>
                            <input type="password" name="repitPassword" id="repitPassword">
                        </td>
                    </tr>
                    <tr id="errores">
                        <?php
                            foreach($aErrores as $error){
                                ?> 
                                <td>
                                    <?php echo $error;?>
                                </td>
                                <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td><input type="submit" class="button" name="cambiar" value="Cambiar Contraseña"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </article>
</section>