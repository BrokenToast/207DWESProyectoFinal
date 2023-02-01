<link rel="stylesheet" href="./webroot/style/rest.css">
<h1>REST(AEMET)</h1>
<form action="./index.php">
    <label for="ubicacion"></label>
    <input type="text" name="ubicacion" id="ubicacion">
    <button type="submit" name="tiempo">Buscar informacion</button>
    <div id="respuesta">
        <table>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
            <tr>
                <th>ubicacion</th>
                <td><?php  echo $aRespuesRest['tiempo']['ubicacion'] ?? 0 ?></td>
            </tr>
            <tr>
                <th>Presion</th>
                <td><?php  echo $aRespuesRest['tiempo']['presion'] ?? 0 ?></td>
            </tr>
            <tr>
                <th>Precipitaciones %</th>
                <td><?php  echo $aRespuesRest['tiempo']['porcentajePrecipitacione'] ?? 0 ?></td>
            </tr>
            <tr>
                <th>Velocidad del viento</th>
                <td><?php  echo $aRespuesRest['tiempo']['velocidadViento'] ?? 0 ?></td>
            </tr>
            <tr>
                <th>Velocidad maxima del viento</th>
                <td><?php  echo $aRespuesRest['tiempo']['velocidadVientoMaxima'] ?? 0 ?></td>
            </tr>
            <tr>
                <th>Temperatura Maxima</th>
                <td><?php  echo $aRespuesRest['tiempo']['temperaturaMaxima'] ?? 0 ?></td>
            </tr>
            <tr>
                <th>Temperatura Minima</th>
                <td><?php  echo $aRespuesRest['tiempo']['temperaturaMinima'] ?? 0 ?></td>
            </tr>
        </table>
    </div>
</form>


<form action="./index.php" method="post">
    <input type="submit" class="buttom" name="volver" value="volver">
</form>