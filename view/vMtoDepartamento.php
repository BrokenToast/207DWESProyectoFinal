<link rel="stylesheet" href="./webroot/style/mtodepartamento.css">
<aside>
    <form action="./index.php" method="post">
        <div>
            <label for="codigo">Codigo</label>
            <input type="text" name="acodigo" id="codigo">
            <label for="descripcion">Descripción</label>
            <input type="text" name="adescripcion" id="descripcion">
            <label for="volumenNegocio">Volumen de Negocio</label>
            <input type="number" name="avolumenNegocio" id="volumenNegocio" value="0">
            <input type="submit" class="button" name="add" value="Añadir">
        </div>
        <input type="file" name="fileimport" id="fileimport">
        <input type="submit" class="button" name="import" value="importar">
        <input type="submit" class="button" name="export" value="exportar">
    </form>
        <?php
            if(!$ok){
            ?> 
            <section>
                <h3>Errores</h3>
                <?php
                    foreach($aError as $error){
                    ?> <p><?php echo $error;?></p> <?php
                    }
                ?>
            </section>
            <?php
            }
        ?>
</aside>
<form action="./index.php" method="post">
    <input type="submit" class="button" name="volver" value="volver">
    <div>
        <label for="descDepartamento">Descripción</label>
        <input type="text" name="bdescripcion" id="descDepartamento" value="<?php echo (!empty($_SESSION['busqueda']['descripcion'])? $_SESSION['busqueda']['descripcion'] : "" )?>">
        <fieldset>
            <legend>Estado:</legend>
            <label for="alta">Alta</label>
            <input type="radio" name="estado" id="alta" value="-1" <?php echo ($_SESSION['busqueda']['estado']==-1)? "checked" : "" ?>>
            <label for="baja">Baja</label>
            <input type="radio" name="estado" id="baja" value="0" <?php echo ($_SESSION['busqueda']['estado']==0)? "checked" : "" ?>>
            <label for="todos">Todos</label>
            <input type="radio" name="estado" id="todos" value="1" <?php echo ($_SESSION['busqueda']['estado']==1)? "checked" : "" ?>> 
        </fieldset>
        <button submit name="buscar" class="button" value="buscar">Buscar</button>
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
        function printDepartamento($departamento){
            ?> 
                <form action="./index.php" method="post" class="itemdep">
                    <tr>
                        <td><input type="text" name="mcodDepartamento" value="<?php echo $departamento->codDepartamento;?>"></td>
                        <td><input type="text" name="mdescDepartamento" value="<?php echo $departamento->descDepartamento;?>"></td>
                        <td><?php echo $departamento->fechaCreacionDepartamento->format('d-m-Y H:i:s');?></td>
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
        if(is_string($aRespuestaMtoDepartamento['departamentos'])){
            ?> 
            <tr>
                <td colspan="7"><?php print $aRespuestaMtoDepartamento['departamentos'];?></td>
            </tr>
            <?php
            
        }else{
            if(isset($aRespuestaMtoDepartamento['departamentos']->codDepartamento)){
                printDepartamento($aRespuestaMtoDepartamento['departamentos']);
            }else{
                foreach ($aRespuestaMtoDepartamento['departamentos'] as $departamento) {
                    printDepartamento($departamento);
                }
            }
        }
        ?>
    </table>
    <form action="index.php" method="post" id="paginacion">
        <input type="submit" value="<<">
        <input type="submit" value="<">
        <p>pagina 1 de n</p>
        <input type="submit" value=">">
        <input type="submit" value=">>">
    </form>