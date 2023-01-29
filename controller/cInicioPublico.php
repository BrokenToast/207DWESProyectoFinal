<?php
if(isset($_REQUEST['guardaridioma'])){
    setcookie('idioma', $_REQUEST['idioma']);
}
if(isset($_REQUEST['login'])){
    if(!isset($_COOKIE['idioma'])){
        setcookie('idioma','es');
    }
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'login';
    header("Location: ./index.php");
    exit;
}
require_once "$aVista[layout]";
?>