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
    function objetosArrays(array $arrayObjetos){
        $aObjetos=[];
        foreach ($arrayObjetos as $objeto) {
            $aobjeto=[];
            foreach ($objeto as $propiedad) {
                array_push($aobjeto,$propiedad);
            }
            array_push($aObjetos,$aobjeto);
        }
        return $aObjetos;
    }
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = "iniciopublico";
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    }
    if(isset($_REQUEST['tecnologias'])){
        $_SESSION['paginaEnCurso'] = "tecnologias";
        header('Location: ./index.php');
        exit;
    }
    require_once $aControlador[$_SESSION['paginaEnCurso']];
    ob_end_flush();
?>