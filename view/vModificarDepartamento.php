<section>
    <form action="index.php" method="post">
        <label for="codDepartamento">Codigo Departamento</label>
        <input type="text" name="codDepartamento" id="codDepartamento" value="<?php echo $aRespuestaVista['codigo'] ?>">
        <label for="descDepartamento">Descripción del Departamento</label>
        <input type="text" name="descDepartamento" id="descDepartamento" value="<?php echo $aRespuestaVista['descripcion'] ?>">
        <label for="volumenNegocio">Volumen del Negocio</label>
        <input type="text" name="volumenNegocio" id="volumenNegocio" value="<?php echo $aRespuestaVista['volumenNegocio'] ?>">
        <label for="fechaCreacion">Fecha de creación</label>
        <input type="text" name="fechaCreacion" id="fechaCreacion" disabled value="<?php echo $aRespuestaVista['fechaCreacion'] ?>">
        <label for="fechaBaja">Fecha de baja</label>
        <input type="text" name="fechaBaja" id="fechaBaja" disabled value="<?php echo $aRespuestaVista['fechaBaja'] ?>">
        <?php 
            if(!$ok && isset($aError)){
                if(isset($aError['codigo'])){
                    ?>  
                    <p>Codigo Departamento:<?php echo $aError['codigo'] ?></p>
                    <?php
                }
                if(isset($aError['descripcion'])){
                    ?>  
                    <p>Descripción del Departamento:<?php echo $aError['descripcion'] ?></p>
                    <?php
                }
                if(isset($aError['volumenNegocio'])){
                    ?>  
                    <p>Volumen del Negocio:<?php echo $aError['volumenNegocio'] ?></p>
                    <?php
                }
                if(isset($aError['fechaCreacion'])){
                    ?>  
                    <p>Fecha de creación:<?php echo $aError['fechaCreacion'] ?></p>
                    <?php
                }
                if(isset($aError['fechaBaja'])){
                    ?>  
                    <p>Fecha de baja:<?php echo $aError['fechaBaja'] ?></p>
                    <?php
                }
            }
        ?>
        <input type="submit" class="button" name="editar" value="Editar">
        <input type="submit" class="button" name="cancelar" value="Cancelar">
    </form>
</section>