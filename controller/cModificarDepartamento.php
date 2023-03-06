<?php
$ok=true;
$departamento=DepartamentoPDO::buscarDepartamentoPorCod($_SESSION ['codDepartamentoEnCurso'])[0];
$aRespuestaVista=[
    "codigo"=>$departamento->codDepartamento,
    "descripcion"=>$departamento->descDepartamento,
    "volumenNegocio"=>$departamento->volumenNegocio,
    "fechaCreacion"=>$departamento->fechaCreacionDepartamento->format('d-m-Y H:i:s'),
    "fechaBaja"=>date('d-m-Y H:i:s',$departamento->fechaBajaDepartamento)
];
if(isset($_REQUEST['cancelar'])){
    cambiarPagina('mtodepartamento');
}else if(isset($_REQUEST['editar'])){
    $aError['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 1);
    $aError['volumenNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'], 100000, 1, 1);
    foreach($aError as $error){
        if(!empty($error)){
            $ok = false;
        }
    }
    if($ok){
        DepartamentoPDO::modificaDepartamento(new Departamento($_SESSION ['codDepartamentoEnCurso'],$_REQUEST['descDepartamento'],0,preg_replace("/,/",".",$_REQUEST['volumenNegocio']),0),$_SESSION ['codDepartamentoEnCurso']);
        cambiarPagina('mtodepartamento');
    }
}
require_once $aVista['layout'];