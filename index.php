<?php
    ob_start();
    require_once('./config/confAPP.php');
    session_start();       
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = "iniciopublico";
    }
    if(isset($_REQUEST['tecnologias'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = "tecnologias";
        header('Location: ./index.php');
        exit;
    }
    require_once $aControlador[$_SESSION['paginaEnCurso']];
    ob_end_flush();
?>