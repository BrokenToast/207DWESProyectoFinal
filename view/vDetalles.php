<link rel="stylesheet" href="./webroot/style/detalle.css">
<section>
    <div class="encabezadoMain">
        <h2>Detalles</h2>
        <form action="./index.php" method="post">
            <input type="submit" name="volver" class="button" value="volver">
        </form>
    </div>
    <article>
        <?php
            //Recorrido con un foreach la variable superglobal $_SERVER
            function printTable(array $dateTable, string $nameTable){
                ?><table>
                    <thead>
                        <tr>
                            <th colspan="2"><?php print $nameTable; ?></th>
                        </tr>
                        <tr>
                            <th>Clave </th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($dateTable as $clave=>$valor){
                                ?>  
                                <tr>
                                    <td><?php print $clave; ?></td>
                                    <td>
                                        <?php
                                            if(is_array($valor)){
                                                printTable($valor,$clave);
                                            }else{
                                                print_r($valor);
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <?php
            }
                //Delcaración de un array con todas las superglobales
                $aVairablesSuper=[
                    "_SESSION"=>$_SESSION?? array(),
                    "_SERVER"=>$_SERVER,
                    "_GET"=>$_GET,
                    "_POST"=>$_POST,
                    "_FILES"=>$_FILES,
                    "_REQUEST"=>$_REQUEST,
                    "_ENV"=>$_ENV,
                    "_COOKIE"=>$_COOKIE,
                    "GLOBALS"=>$GLOBALS
                ];
                // Recorremos el  la array de SuperGlobales y la imprimimos como tablas;
                foreach($aVairablesSuper as $nameGlobalVar=>$aGlobalVar ){
                    //En caso de que la SuperGlobal este vaica muesta esta tabla;
                    if(empty($aGlobalVar)){
                        ?>
                        <table>
                            <thead>
                                <tr>
                                    <th><?php print $nameGlobalVar; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Esta vacia</td>
                                </tr>
                            </tbody>
                        </table> 
                        <?php
                    }else{
                    // En caso de que no este vacia muestra el contenido como en una tabla
                        printTable($aGlobalVar,$nameGlobalVar);
                    }
                }
            ?>
    </article>
    <?php phpinfo() ?>
</section>