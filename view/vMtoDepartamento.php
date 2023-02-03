<form action="./index.php" method="post">
    <input type="submit" class="buttom" name="volver" value="volver">
</form>
<form action="./index.php" method="post">
    <div>
        <label for="descDepartamento">Descripción</label>
        <input type="text" name="descripcion" id="descDepartamento">
        <p>Estado</p>
        <input type="radio" name="estado" id="alta" value="alta">
        <input type="radio" name="estado" id="baja" value="baja">
        <input type="radio" name="estado" id="todos" value="todos"> 
        <label for="alta"></label>
        <label for="baja"></label>
        <label for="todos"></label>
        <button submit name="buscar" value="buscar">Buscar</button>
    </div>
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
                foreach ($aRespuestaMtoDepartamento['departamentos'] as $departamento) {
                    ?> 
                    <tr>
                        <td><?php echo $departamento->codDepartamento ?></td>
                        <td><?php echo $departamento->descDepartamento ?></td>
                        <td><?php echo $departamento->fechaCreacionDepartamento ?></td>
                        <td><?php echo $departamento->volumenNegocio ?></td>
                        <td><?php echo $departamento->fechaBajaDepartamento ?></td>
                        <td></td>
                    </tr>
                    <?php
                }
            }  
        ?>
    </table>

</form>