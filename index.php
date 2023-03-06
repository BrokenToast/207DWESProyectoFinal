<?php
    ob_start();
    require_once('./config/confAPP.php');
    session_start();
    function cambiarPagina(string $pagina,bool $modificar=true){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = $pagina;
        header("Location: index.php");
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
        $_REQUEST['pagina']="iniciopublico";
    }
    if(isset($_REQUEST['tecnologias'])){
        cambiarPagina("tecnologias");
    }
    require_once $aControlador[$_SESSION['paginaEnCurso']];
    ob_end_flush();
?>