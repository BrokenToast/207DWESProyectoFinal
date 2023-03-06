<?php
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = $_SESSION['error']->paginaSiguiente;
    unset($_SESSION['error']);
    header('Location: ./index.php');
    exit;
}
$aRespuestaError['code'] = $_SESSION['error']->getCode();
$aRespuestaError['mensaje'] = $_SESSION['error']->getMessage();
$aRespuestaError['linia'] = $_SESSION['error']->getLine();
$aRespuestaError['fichero'] = $_SESSION['error']->getFile();
require_once $aVista['layout'];