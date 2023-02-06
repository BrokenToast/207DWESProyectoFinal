<?php
$aRespuestaMtoDepartamento = [];
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = "inicioprivado";
    header('Location: ./index.php');
    exit;
}
require_once('cGlobal.php');
if(isset($_REQUEST['buscar'])){
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDesc($_REQUEST['bdescripcion'],(int)$_REQUEST['estado']);
}
if(isset($_REQUEST['alta'])){
    $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['alta'];
    DepartamentoPDO::rehabilitaDepartamento();
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDesc("",-1);
}
if(isset($_REQUEST['baja'])){
    $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['baja'];
    DepartamentoPDO::bajaLogicaDepartamento();
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDesc("",-1);
}
if(isset($_REQUEST['editar'])){
    $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['editar'];
    $oFechaCreacion=new DateTime($_REQUEST['mfechaCreacion']);
    DepartamentoPDO::modificaDepartamento(new Departamento($_REQUEST['mcodDepartamento'],$_REQUEST['mdescDepartamento'],$oFechaCreacion->getTimestamp(),$_REQUEST['mvolumenNegocio']));
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDesc("",-1);
}
if(isset($_REQUEST['eliminar'])){
    $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['eliminar'];
    DepartamentoPDO::bajaFisicaDepartamento();
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDesc("",-1);
}
if(isset($_REQUEST['add'])){
    DepartamentoPDO::altaDepartamento(new Departamento($_REQUEST['acodigo'],$_REQUEST['adescripcion'],time(),$_REQUEST['avolumenNegocio']));
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDesc("",-1);
}
if(isset($_REQUEST['import'])){
}
if(isset($_REQUEST['export'])){
}
require_once $aVista['layout'];