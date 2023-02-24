<?php
$ok=true;
$departamento=DepartamentoPDO::buscarDepartamentoPorCod($_SESSION ['codDepartamentoEnCurso']);
$aRespuestaVista=[
    "codigo"=>$departamento[0]->codDepartamento,
    "descripcion"=>$departamento[0]->descDepartamento,
    "volumenNegocio"=>$departamento[0]->volumenNegocio,
    "fechaCreacion"=>$departamento[0]->fechaCreacionDepartamento->format('d-m-Y H:i:s'),
    "fechaBaja"=>date('d-m-Y H:i:s',$departamento[0]->fechaBajaDepartamento)
];
if(isset($_REQUEST['cancelar'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('Location: ./index.php');
    exit;
}else if(isset($_REQUEST['editar'])){
    $aError['codigo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamento'], 3, 3, 1);
    $aError['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 1);
    $aError['volumenNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'], 100000, 1, 1);
    foreach($aError as $error){
        if(!empty($error)){
            $ok = false;
        }
    }
    if($ok){
        DepartamentoPDO::modificaDepartamento(new Departamento($_REQUEST['editar'],$_REQUEST['mdescDepartamento'],0,$_REQUEST['mvolumenNegocio']),$_SESSION ['codDepartamentoEnCurso']);
    }
}
require_once $aVista['layout'];