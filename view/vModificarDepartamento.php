<link rel="stylesheet" href="webroot/style/modificarDepartamento.css">
<section>
    <div class="encabezadoMain">
        <h2>Modificar Departamento</h2>
    </div>
    <form action="index.php" method="post">
        <label for="codDepartamento">Codigo Departamento</label>
        <input type="text" name="codDepartamento" id="codDepartamento" disabled placeholder="<?php echo $aRespuestaVista['codigo'] ?>">
        <label for="descDepartamento">Descripción del Departamento</label>
        <input type="text" name="descDepartamento" id="descDepartamento" placeholder="<?php echo $aRespuestaVista['descripcion'] ?>">
        <label for="volumenNegocio">Volumen del Negocio</label>
        <input type="text" name="volumenNegocio" id="volumenNegocio" placeholder="<?php echo $aRespuestaVista['volumenNegocio'] ?>">
        <label for="fechaCreacion">Fecha de creación</label>
        <input type="text" name="fechaCreacion" id="fechaCreacion" disabled placeholder="<?php echo $aRespuestaVista['fechaCreacion'] ?>">
        <label for="fechaBaja">Fecha de baja</label>
        <input type="text" name="fechaBaja" id="fechaBaja" disabled placeholder="<?php echo $aRespuestaVista['fechaBaja'] ?>">
        <?php 
            if(isset($aError)){
                if(isset($aError['descripcion'])){
                    ?>  
                    <p class="textError">Descripción del Departamento:<?php echo $aError['descripcion'] ?></p>
                    <?php
                }
                if(isset($aError['volumenNegocio'])){
                    ?>  
                    <p class="textError">Volumen del Negocio:<?php echo $aError['volumenNegocio'] ?></p>
                    <?php
                }
            }
        ?>
        <input type="submit" class="button" name="editar" value="Editar">
        <input type="submit" class="button" name="cancelar" value="Cancelar">
    </form>
</section>