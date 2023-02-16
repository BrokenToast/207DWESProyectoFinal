<?php
$aError=[];
$ok = true;
$aRespuestaMtoDepartamento = [
    'departamentos'=>null
];
if(!isset($_SESSION['numPaginacionDepartamentos'])){
    $_SESSION['numPaginacionDepartamentos']=4;
}
if(!isset($_SESSION["criterioBusquedaDepartamento"])){
    $_SESSION["criterioBusquedaDepartamento"]=[
        'descripcion'=>"",
        'estado'=>1
    ];
}
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = "inicioprivado";
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['buscar'])){
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDescPagiado($_REQUEST['bdescripcion'],(int)$_REQUEST['estado']);
    $_SESSION['criterioBusquedaDepartamento']['descripcion']=$_REQUEST['bdescripcion'];
    $_SESSION['criterioBusquedaDepartamento']['estado']=(int)$_REQUEST['estado'];
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
        $aError['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['adescripcion'], 255, 0, 1);
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
        DepartamentoPDO::importarDepartamentos($_FILES['fileimport']);
    }
    if(isset($_REQUEST['export'])){
        DepartamentoPDO::exportarDepartamento();
    }
    if(isset($_REQUEST['principio'])){
        $_SESSION['numPaginacionDepartamentos']=4;
    }
    if(isset($_REQUEST['anterior'])){
        if($_SESSION['numPaginacionDepartamentos']>4){
            $_SESSION['numPaginacionDepartamentos']=-4;
            if($_SESSION['numPaginacionDepartamentos']<4){
                $_SESSION['numPaginacionDepartamentos']=4;
            }
        }
    }
    if(isset($_REQUEST['siguiente'])){
        if($_SESSION['numPaginacionDepartamentos']<=$_SESSION['cantidadDepartamentos']){
            $_SESSION['numPaginacionDepartamentos']=+4;
        }
    }
    if(isset($_REQUEST['ultima'])){
        $_SESSION['numPaginacionDepartamentos']=$_SESSION['cantidadDepartamentos'];
    }
    $aRespuestaMtoDepartamento['departamentos']=[];
    foreach (DepartamentoPDO::bucarDepartamentoPorDescPagiado($_SESSION['criterioBusquedaDepartamento']['descripcion'],$_SESSION['criterioBusquedaDepartamento']['estado']) as $departamento) {
        array_push($aRespuestaMtoDepartamento['departamentos'],[
            'codDepartamento'=>$departamento->codDepartamento,
            'descDepartamento'=>$departamento->descDepartamento,
            'fechaCreacionDepartamento'=>$departamento->fechaCreacionDepartamento,
            'volumenNegocio'=>$departamento->volumenNegocio,
            'fechaBajaDepartamento'=>$departamento->fechaBajaDepartamento
        ]);
    }
}
require_once $aVista['layout'];