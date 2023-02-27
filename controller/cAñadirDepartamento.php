<?php
$ok=true;
if(isset($_REQUEST['cancelar'])){
    cambiarPagina('mtodepartamento');
}else if(isset($_REQUEST['add'])){
    $aError['codigo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamento'], 3, 3, 1);
    $aError['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 1);
    $aError['volumenNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'], 100000, 1, 1);
    foreach($aError as $error){
        if(!empty($error)){
            $ok = false;
        }
    }
    if($ok){
        DepartamentoPDO::altaDepartamento(new Departamento($_REQUEST['codDepartamento'],$_REQUEST['codDepartamento'],0,$_REQUEST['volumenNegocio']));
    }
    cambiarPagina('mtodepartamento');
}
require_once $aVista['layout'];