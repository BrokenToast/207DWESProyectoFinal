<link rel="stylesheet" href="./webroot/style/registro.css">
<h2>Registrarse</h2>
<section>
    <article>
    <form action="./index.php" method="post">
        <input type="submit" class="button" name="volver" value="volver">
            <fieldset>
                <legend>Registrarse</legend>
                <table id="tableForm">
                    <tr>
                        <td><label>Usuario*</label></td>
                        <td><input type="text" name="usuario" value="<?php echo (isset($aErrores['usuario']) && empty($aErrores['usuario'])) ? $_REQUEST['usuario']:"";?>"></td>
                    </tr>
                    <tr>
                        <td><label>Password*</label></td>
                        <td><input type="password" name="password" value="<?php echo (isset($aErrores['password']) && empty($aErrores['password'])) ? $_REQUEST['password']:"";?>"></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion del Usuario</label></td>
                        <td>
                            <textarea name="descUsuario" id="descUsuario" cols="20" rows="4"><?php echo $_REQUEST['descUsuario']??"" ?></textarea>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td><label>Imagen</label></td>
                        <td><input type="file" name="imagen" value="<?php //echo (isset($_REQUEST['registrar'])) ? $_REQUEST['imagen']:"";?>"></td>
                    </tr> -->
                    <tr id="errores">
                        <td colspan="2">
                            <ul>
                            <?php
                            foreach($aErrores?? [] as $nombreCampo=>$error){
                                if(!empty($error)){
                                    ?> <li style="color:red;"> <?php echo $nombreCampo.":".$error?></li> <?php
                                }
                            }
                            ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" class="button" name="registrar" value="registrar"></td>
                    </tr>
                    <tr>
                        <td id="captcha" colspan="2">
                            <div>
                                <div id="num1" class="itemCaptcha"></div>
                                <p>+</p>
                                <div id="num2" class="itemCaptcha"></div>
                                <p>=</p>
                                <div id="resultado" class="itemCaptcha"></div>
                            </div>
                            <div>
                                <div id="res1" class="itemCaptcha"></div>
                                <div id="res2" class="itemCaptcha"></div>
                                <div id="res3" class="itemCaptcha"></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </article>
</section>
<script type="module" defer src="./webroot/javascript/registrarse.js"></script>