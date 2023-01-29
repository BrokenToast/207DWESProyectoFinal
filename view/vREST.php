<link rel="stylesheet" href="./webroot/style/wipError.css">
<h1>REST(AEMET)</h1>
<table>
    <tr>
        <th>Dia</th>
        <th>Maximo</th>
        <th>Minimo</th>
    </tr>
    <?php
        foreach ($tiempo as $dia => $temperatura) {
            ?> 
            <tr>
                <th><?php echo $dia;?></th>
                <td><?php echo $temperatura[0];?></td>
                <td><?php echo $temperatura[1];?></td>
            </tr>
            <?php
        }
    ?>

</table>


<form action="./index.php" method="post">
    <input type="submit" class="buttom" name="volver" value="volver">
</form>