<?php
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('Location: ./index.php');
    exit;
}
require_once $aVista['layout'];