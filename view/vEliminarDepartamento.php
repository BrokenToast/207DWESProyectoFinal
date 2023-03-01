<link rel="stylesheet" href="webroot/style/modificarDepartamento.css">
<section>
    <h2>Eliminar departamento</h2>
    <form action="index.php" method="post">
        <label for="codDepartamento">Codigo Departamento</label>
        <input type="text" name="codDepartamento" id="codDepartamento" disabled placeholder="<?php echo $aRespuestaVista['codigo'] ?>">
        <label for="descDepartamento">Descripción del Departamento</label>
        <input type="text" name="descDepartamento" id="descDepartamento" disabled placeholder="<?php echo $aRespuestaVista['descripcion'] ?>">
        <label for="volumenNegocio">Volumen del Negocio</label>
        <input type="text" name="volumenNegocio" id="volumenNegocio" disabled placeholder="<?php echo $aRespuestaVista['volumenNegocio'] ?>">
        <label for="fechaCreacion">Fecha de creación</label>
        <input type="text" name="fechaCreacion" id="fechaCreacion" disabled placeholder="<?php echo $aRespuestaVista['fechaCreacion'] ?>">
        <label for="fechaBaja">Fecha de baja</label>
        <input type="text" name="fechaBaja" id="fechaBaja" disabled placeholder="<?php echo $aRespuestaVista['fechaBaja'] ?>">
        <input type="submit" class="button" name="eliminar" value="Eliminar">
        <input type="submit" class="button" name="cancelar" value="Cancelar">
    </form>
</section>