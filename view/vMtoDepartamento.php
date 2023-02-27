<link rel="stylesheet" href="./webroot/style/mtodepartamento.css">
<form enctype="multipart/form-data" action="./index.php" method="post">
    <input type="submit" class="button" name="boton" value="volver" id="volver">
</form>
<form action="./index.php" method="post" id="busqueda">
    <label for="descDepartamento">Descripción</label>
    <input type="text" name="bdescripcion" id="descDepartamento" value="<?php echo (!empty($_SESSION['criterioBusquedaDepartamento']['descripcion'])? $_SESSION['criterioBusquedaDepartamento']['descripcion'] : "" )?>">
    <fieldset>
        <legend>Estado:</legend>
        <label for="alta">Alta</label>
        <input type="radio" name="estado" id="alta" value="-1" <?php echo ($_SESSION['criterioBusquedaDepartamento']['estado']==-1)? "checked" : "" ?>>
        <label for="baja">Baja</label>
        <input type="radio" name="estado" id="baja" value="0" <?php echo ($_SESSION['criterioBusquedaDepartamento']['estado']==0)? "checked" : "" ?>>
        <label for="todos">Todos</label>
        <input type="radio" name="estado" id="todos" value="1" <?php echo ($_SESSION['criterioBusquedaDepartamento']['estado']==1)? "checked" : "" ?>> 
    </fieldset>
    <div>
        <button submit name="boton" class="button" value="buscar">Buscar</button>
        <input type="submit" class="button" name="boton" value="Añadir">
        <div>
            <input type="submit" class="button" name="boton" value="exportar">
            <input type="submit" class="button" name="boton" value="importar">
            <input type="file" name="fileimport" id="fileimport">
        </div>
    </div>
</form>

<table>
    <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Creacion</th>
        <th>Volumen Negocio</th>
        <th>Fecha Baja</th>
        <th>Operaciones</th>
    </tr>
    <?php
    if(is_string($aRespuestaMtoDepartamento['departamentos'])){
        ?> 
        <tr>
            <td colspan="7"><?php print $aRespuestaMtoDepartamento['departamentos'];?></td>
        </tr>
        <?php
        
    }else{
            foreach ($aRespuestaMtoDepartamento['departamentos'] as $departamento) {
                ?> 
                <form action="./index.php" method="post" class="itemdep">
                    <tr>
                        <td><?php echo $departamento[0];?></td>
                        <td><?php echo $departamento[1];?></td>
                        <td><?php echo $departamento[2]->format('d-m-Y H:i:s');?></td>
                        <td><?php echo $departamento[3];?></td>
                        <td><?php echo (is_null($departamento[4]) || $departamento[4]==0)? null : date('d-m-Y H:i:s',$departamento[4]) ;?></td>
                        <td>
                            <?php
                                if (is_null($departamento[4])) {
                                    ?> 
                                    <button type="submit" name="baja" value="<?php echo $departamento[0];?>" ><img src="./webroot/media/img/operacionesDB/flecha-hacia-abajo.png" alt="Alta Logica" width="30" height="30"></button>
                                    <?php
                                }else{
                                    ?> 
                                    <button type="submit" name="alta" value="<?php echo $departamento[0];?>" ><img src="./webroot/media/img/operacionesDB/flecha-hacia-arriba.png" alt="Baja Logica" width="30" height="30"></button>
                                    <?php
                                }
                            ?>
                            <button type="submit" name="editar" value="<?php echo $departamento[0];?>" ><img src="./webroot/media/img/operacionesDB/editar.png" alt="Editar" width="30" height="30"></button>
                            <button type="submit" name="eliminar" value="<?php echo $departamento[0];?>" ><img src="./webroot/media/img/operacionesDB/tacho-de-reciclaje.png" alt="Eliminar" width="30" height="30"></button>
                        </td>
                    </tr>
                </form>
            <?php
            }
    }
    ?>
</table>
<form action="index.php" method="post" id="paginacion">
    <input type="submit" name="principio" value="<<">
    <input type="submit" name="anterior" value="<">
    <p>pagina <?php echo $_SESSION['paginacionDepartamento']['paginaActual']+1;?> de <?php echo $_SESSION['paginacionDepartamento']['maximo'];?></p>
    <input type="submit" name="siguiente" value=">">
    <input type="submit" name="ultima" value=">>">
</form> 
