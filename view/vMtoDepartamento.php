<link rel="stylesheet" href="./webroot/style/mtodepartamento.css">
<aside>
    <form action="./index.php" method="post">
        <div>
            <label for="codigo">Codigo</label>
            <input type="text" name="acodigo" id="codigo">
            <label for="descripcion">Descripción</label>
            <input type="text" name="adescripcion" id="descripcion">
            <label for="volumenNegocio">Volumen de Negocio</label>
            <input type="number" name="avolumenNegocio" id="volumenNegocio">
            <input type="submit" class="buttom" name="add" value="Añadir">
        </div>
        <input type="submit" class="buttom" name="import" value="importar">
        <input type="submit" class="buttom" name="export" value="exportar">
    </form>
</aside>
<form action="./index.php" method="post">
    <input type="submit" class="buttom" name="volver" value="volver">
    <div>
        <label for="descDepartamento">Descripción</label>
        <input type="text" name="bdescripcion" id="descDepartamento">
        <fieldset>
            <legend>Estado:</legend>
            <label for="alta">Alta</label>
            <input type="radio" name="estado" id="alta" value="1">
            <label for="baja">Baja</label>
            <input type="radio" name="estado" id="baja" value="0">
            <label for="todos">Todos</label>
            <input type="radio" name="estado" id="todos" value="-1" checked> 
        </fieldset>
        <button submit name="buscar" class="buttom" value="buscar">Buscar</button>
    </div>
</form>
    <table>
        <tr>
            <th>Cod</th>
            <th>Desc</th>
            <th>Creacion</th>
            <th>Volumen</th>
            <th>Fecha Baja</th>
            <th>Operaciones</th>
        </tr>
        <?php
            if (isset($aRespuestaMtoDepartamento['departamentos'])) {
                if(isset($aRespuestaMtoDepartamento['departamentos']->codDepartamento)){
                    ?> 
                    <form action="./index.php" method="post" class="itemdep">
                        <td><input type="text" name="mcodDepartamento" value="<?php echo $aRespuestaMtoDepartamento['departamentos']->codDepartamento;?>"></td>
                        <td><input type="text" name="mdescDepartamento" value="<?php echo $aRespuestaMtoDepartamento['departamentos']->descDepartamento;?>"></td>
                        <td><?php echo $aRespuestaMtoDepartamento['departamentos']->fechaCreacionDepartamento->format('d-m-Y H:i:s');?></td>
                        <td><input type="number" name="mvolumenNegocio" value="<?php echo $aRespuestaMtoDepartamento['departamentos']->volumenNegocio;?>"></td>
                        <td><?php echo (is_null($aRespuestaMtoDepartamento['departamentos']->fechaBajaDepartamento) || $aRespuestaMtoDepartamento['departamentos']->fechaBajaDepartamento==0)? null : date('d-m-Y H:i:s',$aRespuestaMtoDepartamento['departamentos']->fechaBajaDepartamento) ;?></td>
                        <td>
                            <button type="submit" name="baja" value="<?php echo $aRespuestaMtoDepartamento['departamentos']->codDepartamento;?>" ><img src="./webroot/media/img/operacionesDB/flecha-hacia-abajo.png" alt="Alta Logica" width="30" height="30"></button>
                            <button type="submit" name="alta" value="<?php echo $aRespuestaMtoDepartamento['departamentos']->codDepartamento;?>" ><img src="./webroot/media/img/operacionesDB/flecha-hacia-arriba.png" alt="Baja Logica" width="30" height="30"></button>
                            <button type="submit" name="editar" value="<?php echo $aRespuestaMtoDepartamento['departamentos']->codDepartamento;?>" ><img src="./webroot/media/img/operacionesDB/editar.png" alt="Editar" width="30" height="30"></button>
                            <button type="submit" name="eliminar" value="<?php echo $aRespuestaMtoDepartamento['departamentos']->codDepartamento;?>" ><img src="./webroot/media/img/operacionesDB/tacho-de-reciclaje.png" alt="Eliminar" width="30" height="30"></button>
                        </td>
                    </form>
                    <?php
                }else{
                    foreach ($aRespuestaMtoDepartamento['departamentos'] as $departamento) {
                        ?> 
                        <form action="./index.php" method="post" class="itemdep" >
                            <tr>
                            <td><input type="text" name="mcodDepartamento" value="<?php echo $departamento->codDepartamento;?>"></td>
                            <td><input type="text" name="mdescDepartamento" value="<?php echo $departamento->descDepartamento;?>"></td>
                            <td><input type="text" name="mfechaCreacion" value="<?php echo $departamento->fechaCreacionDepartamento->format('d-m-Y H:i:s');?>"></td>
                            <td><input type="number" name="mvolumenNegocio" value="<?php echo $departamento->volumenNegocio;?>"></td>
                            <td><?php echo (is_null($departamento->fechaBajaDepartamento) || $departamento->fechaBajaDepartamento==0)? null : date('d-m-Y H:i:s',$departamento->fechaBajaDepartamento) ;?></td>
                                <td>
                                    <button type="submit" name="baja" value="<?php echo $departamento->codDepartamento;?>" ><img src="./webroot/media/img/operacionesDB/flecha-hacia-abajo.png" alt="Alta Logica" width="30" height="30"></button>
                                    <button type="submit" name="alta" value="<?php echo $departamento->codDepartamento;?>" ><img src="./webroot/media/img/operacionesDB/flecha-hacia-arriba.png" alt="Baja Logica" width="30" height="30"></button>
                                    <button type="submit" name="editar" value="<?php echo $departamento->codDepartamento;?>" ><img src="./webroot/media/img/operacionesDB/editar.png" alt="Editar" width="30" height="30"></button>
                                    <button type="submit" name="eliminar" value="<?php echo $departamento->codDepartamento;?>" ><img src="./webroot/media/img/operacionesDB/tacho-de-reciclaje.png" alt="Eliminar" width="30" height="30"></button>
                                </td>
                            </tr>
                        </form>
                        <?php
                    }
                }
            }  
        ?>
    </table>