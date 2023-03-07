<?php
$ok=true;
if(isset($_REQUEST['cancelar'])){
    cambiarPagina('mtodepartamento');
}else if(isset($_REQUEST['add'])){
    $_REQUEST['volumenNegocio']=preg_replace("/,/",".",$_REQUEST['volumenNegocio']);
    $aError['codigo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamento'], 3, 3, 1);
    $aError['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 1);
    $aError['volumenNegocio'] = validacionFormularios::comprobarNumber($_REQUEST['volumenNegocio'], 100000, 1, 1);
    if(!DepartamentoPDO::validaCodNoExiste($_REQUEST['codDepartamento'])){
        $aError['codigo'] = "El codigo existe";
    }
    foreach($aError as $error){
        if(!empty($error)){
            $ok = false;
        }
    }
    if($ok){
        echo DepartamentoPDO::altaDepartamento(new Departamento($_REQUEST['codDepartamento'],$_REQUEST['descDepartamento'],0,$_REQUEST['volumenNegocio']));
        cambiarPagina('mtodepartamento');
    }
}
require_once $aVista['layout'];