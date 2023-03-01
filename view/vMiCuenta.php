<link rel="stylesheet" href="./webroot/style/miCuenta.css">
<h2>Editar mi cuenta</h2>
<section>
    <article>
            <form action="./index.php" method="post">
            <input type="submit" class="button" name="volver" value="Volver">
                <div>
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
                                <td><input type="submit" class="button" name="changeUser" value="Editar perfil"></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Editar Contraseña o Eliminar Cuenta</legend>
                            <table>
                                <tr>
                                    <td>Introduce contraseña:</td>
                                    <td><input type="password" name="currentPassword" id="currentPassword"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="button" name="changePassword" value="Cambiar contraseña"></td>
                                    <td><input type="submit" class="button" name="borrar" value="Borrar Cuenta"></td>
                                </tr>
                            </table>
                    </fieldset>
                </div>
            </form>
    </article>
</section>