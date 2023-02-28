<link rel="stylesheet" href="./webroot/style/rest.css">
<h2>Rest</h2>
<form action="./index.php" method="post">
    <input type="submit" class="button" name="volver" value="volver">
</form>
<h3>AEMET</h3>
<form action="./index.php">
    <label for="estacion">Estaciones</label>
    <select name="estacion" id="estacion">
        <?php
            foreach($aRespuesRest['estaciones'] as $nombre => $id){
                ?> <option value="<?php echo "$id"?>"><?php echo "$nombre"?></option> <?php
            }
        ?>
        
    </select>
    <button type="submit" name="tiempo">Buscar informacion</button>
    <div id="respuesta">
        <table>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
            <tr>
                <th>ubicacion</th>
                <td><?php  echo $aRespuesRest['tiempo']['ubicacion'] ?? ""?></td>
            </tr>
            <tr>
                <th>Presion</th>
                <td><?php  echo $aRespuesRest['tiempo']['presion'] ?? ""?></td>
            </tr>
            <tr>
                <th>Precipitaciones %</th>
                <td><?php  echo $aRespuesRest['tiempo']['porcentajePrecipitaciones'] ?? ""?></td>
            </tr>
            <tr>
                <th>Velocidad del viento</th>
                <td><?php  echo $aRespuesRest['tiempo']['velocidadViento'] ?? ""?></td>
            </tr>
            <tr>
                <th>Velocidad maxima del viento</th>
                <td><?php  echo $aRespuesRest['tiempo']['velocidadVientoMaxima'] ?? ""?></td>
            </tr>
            <tr>
                <th>Temperatura Maxima</th>
                <td><?php  echo $aRespuesRest['tiempo']['temperaturaMaxima'] ?? ""?></td>
            </tr>
            <tr>
                <th>Temperatura Minima</th>
                <td><?php  echo $aRespuesRest['tiempo']['temperaturaMinima'] ?? ""?></td>
            </tr>
        </table>
    </div>
</form>