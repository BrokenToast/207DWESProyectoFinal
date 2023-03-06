<link rel="stylesheet" href="./webroot/style/miCuenta.css">

<section>
    <div class="encabezadoMain">
        <h2>Editar mi cuenta</h2>
        <form action="index.php" method="post">
            <input type="submit" class="button" name="volver" value="Volver">
        </form>
    </div>
    <article>
            <form action="./index.php" method="post" class="formEstandar">
                <fieldset>
                    <legend>Editar Perfil</legend>
                    <table>
                        <tr>
                            <td>Usuario:</td>
                            <td>
                                <input disabled type="text" name="userName" id="userName" value="<?php echo $aRespuestaMiCuenta['codUsuario'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Descripción del usuario:</td>
                            <td>
                                <textarea name="descUsuario" id="descUsuario" cols="60" rows="4"><?php echo $aRespuestaMiCuenta['descUsuario'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Fecha ultima conexión:</td>
                            <td>
                                <input disabled type="text" name="fechaUltima" id="fechaUltima" value="<?php echo $aRespuestaMiCuenta['fechaHoraUltimaConexion'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Numero de conexiones:</td>
                            <td>
                                <input disabled type="number" name="numeroConexiones" id="numeroConexiones" value="<?php echo $aRespuestaMiCuenta['numAccesos'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Tipo de perfil:</td>
                            <td>
                                <input disabled type="text" name="tipoPerfil" id="tipoPerfil" value="<?php echo $aRespuestaMiCuenta['perfil'];?>">
                            </td>
                        </tr>
                        <tr>   
                            <?php
                            foreach($aErrores ?? [] as $error){
                                if(!empty($error)){
                                    ?> <li style="color:red;"> <?php echo $error?></li> <?php
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            <td id="botones">
                                <button type="submit" class="button" name="changeUser">Editar perfil</button>
                                <button type="submit" class="button" name="changePassword">Cambiar contraseña</button>
                                <button type="submit" class="button" name="borrar">Borrar Cuenta</button>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
    </article>
</section>