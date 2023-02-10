<?php
$aError=[];
$ok = true;
$aRespuestaMtoDepartamento = [];
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = "inicioprivado";
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['buscar'])){
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDesc($_REQUEST['bdescripcion'],(int)$_REQUEST['estado']);
}else{
    if(isset($_REQUEST['alta'])){
        $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['alta'];
        DepartamentoPDO::rehabilitaDepartamento();
    }
    if(isset($_REQUEST['baja'])){
        $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['baja'];
        DepartamentoPDO::bajaLogicaDepartamento();
    }
    if(isset($_REQUEST['editar'])){
        $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['editar'];
        $aError['codigo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['mcodDepartamento'], 3, 3, 1);
        $aError['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['mdescDepartamento'], 255, 0, 1);
        $aError['volumennegocio'] = validacionFormularios::comprobarNumber($_REQUEST['mvolumenNegocio'], 100000, 0, 1);
        foreach($aError as $error){
            if(!empty($error)){
                $ok = false;
            }
        }
        if($ok){
            DepartamentoPDO::modificaDepartamento(new Departamento($_REQUEST['mcodDepartamento'],$_REQUEST['mdescDepartamento'],0,$_REQUEST['mvolumenNegocio']));
        }
    }
    if(isset($_REQUEST['eliminar'])){
        $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['eliminar'];
        DepartamentoPDO::bajaFisicaDepartamento();
    }
    if(isset($_REQUEST['add'])){
        $aError['codigo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['acodigo'], 3, 3, 1);
        $aError['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['acodigo'], 255, 0, 1);
        foreach($aError as $error){
            if(!empty($error)){
                $ok = false;
            }
        }
        if($ok){
            DepartamentoPDO::altaDepartamento(new Departamento($_REQUEST['acodigo'],$_REQUEST['adescripcion'],time(),$_REQUEST['avolumenNegocio']));
        }
    }
    if(isset($_REQUEST['import'])){
    }
    if(isset($_REQUEST['export'])){
    }
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDesc("",-1);
}
require_once $aVista['layout'];