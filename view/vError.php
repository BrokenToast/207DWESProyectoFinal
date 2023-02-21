<link rel="stylesheet" href="./webroot/style/wipError.css">
<h1>Error:<?php echo $aRespuestaError['code'];?></h1>
<h2><?php echo $aRespuestaError['mensaje'];?> <br> Linia que Produce el Error: <?php echo $aRespuestaError['linia'] ;?> <br> Fichero que proboca el error: <?php echo $aRespuestaError['fichero'];?> </h2>
<form action="./index.php" method="post">
    <input type="submit" class="button" name="volver" value="volver">
</form>