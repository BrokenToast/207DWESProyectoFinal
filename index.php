<?php
    ob_start();
    require_once('./config/confAPP.php');
    session_start();
    function cambiarPagina(string $pagina){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = $pagina;
        header('Location: ./index.php');
        exit;
    }
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = "iniciopublico";
    }
    if(isset($_REQUEST['tecnologias'])){
        cambiarPagina("tecnologias");
    }
    require_once $aControlador[$_SESSION['paginaEnCurso']];
    ob_end_flush();
?>