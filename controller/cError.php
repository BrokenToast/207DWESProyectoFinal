<?php
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    unset($_SESSION['error']);
    header('Location: ./index.php');
    exit;
}
$_SESSION['error']->llamarVError();
$aRespuestaError['code'] = $_SESSION['error']->getCode();
$aRespuestaError['mensaje'] = $_SESSION['error']->getMessage();

require_once $aVista['layout'];