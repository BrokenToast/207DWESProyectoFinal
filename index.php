<?php
    ob_start();
    require_once('./config/confAPP.php');
    session_start();       
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = "iniciopublico";
    }
    require_once $aControlador[$_SESSION['paginaEnCurso']];
    ob_end_flush();
?>