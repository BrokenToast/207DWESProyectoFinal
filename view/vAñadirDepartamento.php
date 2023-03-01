<link rel="stylesheet" href="webroot/style/modificarDepartamento.css">
<section>
    <h2>Añadir departamento</h2>
    <form action="index.php" method="post">
        <label for="codDepartamento">Codigo Departamento</label>
        <input type="text" name="codDepartamento" id="codDepartamento">
        <label for="descDepartamento">Descripción del Departamento</label>
        <input type="text" name="descDepartamento" id="descDepartamento">
        <label for="volumenNegocio">Volumen del Negocio</label>
        <input type="text" name="volumenNegocio" id="volumenNegocio">
        <label for="fechaCreacion">Fecha de creación</label>
        <input type="text" name="fechaCreacion" id="fechaCreacion" disabled>
        <label for="fechaBaja">Fecha de baja</label> 
        <input type="text" name="fechaBaja" id="fechaBaja" disabled>
        <?php 
            if(isset($aError)){
                if(!empty($aError['codigo'])){
                    ?>  
                    <p>Codigo Departamento:<?php echo $aError['codigo'] ?></p>
                    <?php
                }
                if(!empty($aError['descripcion'])){
                    ?>  
                    <p>Descripción del Departamento:<?php echo $aError['descripcion'] ?></p>
                    <?php
                }
                if(!empty($aError['volumenNegocio'])){
                    ?>  
                    <p>Volumen del Negocio:<?php echo $aError['volumenNegocio'] ?></p>
                    <?php
                }
            }
        ?>
        <input type="submit" class="button" name="add" value="Añadir">
        <input type="submit" class="button" name="cancelar" value="Cancelar">
    </form>
</section>