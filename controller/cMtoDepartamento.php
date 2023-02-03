<?php
$aRespuestaMtoDepartamento = [];
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['buscar'])){
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDesc($_REQUEST['descripcion']);
}
require_once $aVista['layout'];