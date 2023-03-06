<link rel="stylesheet" href="./webroot/style/registro.css">

<section>
    <div class="encabezadoMain">
        <h2>Registrarse</h2>
        <form action="index.php" method="post">
            <input type="submit" class="button" name="volver" value="volver">
        </form>
    </div>
    <article>
        <form action="./index.php" method="post">
            <fieldset>
                <legend>Registrarse</legend>
                <div>
                    <label for="usuario">Usuario*</label>
                    <input type="text" name="usuario" id="usuario" value="<?php echo (isset($aErrores['usuario']) && empty($aErrores['usuario'])) ? $_REQUEST['usuario']:"";?>">
                </div>
                <div>
                    <label for="password">Password*</label>
                    <input type="password" name="password" id="password" value="<?php echo (isset($aErrores['password']) && empty($aErrores['password'])) ? $_REQUEST['password']:"";?>">
                </div>
                <div>
                    <label for="descUsuario">Descripcion del Usuario</label>
                    <textarea name="descUsuario" id="descUsuario" cols="20" rows="4"><?php echo $_REQUEST['descUsuario']??"" ?></textarea>
                </div>
                <div>
                    <?php
                    if(!empty($aErrores)){
                        if(!empty($aErrores["usuario"])){
                            ?> <p class="textError">Usuario: <?php echo $aErrores["usuario"];?></p> <?php
                        }
                        if(!empty($aErrores["password"])){
                            ?> <p class="textError">Contraseña:<?php echo $aErrores["password"];?></p> <?php
                        }
                        if(!empty($aErrores["descUsuario"])){
                            ?> <p class="textError">Descripción:<?php echo $aErrores["descUsuario"];?></p> <?php
                        }
                    }
                    ?>
                </div>
                <button type="submit" name="registrar" class="button">Registrarse</button>
                <div id="captcha" colspan="2">
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
                </div>
            </fieldset>
        </form>
    </article>
</section>
<script type="module" defer src="./webroot/javascript/registrarse.js"></script>