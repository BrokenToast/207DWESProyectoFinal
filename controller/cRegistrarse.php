<?php
$ok = "";
if(isset($_REQUEST['registrar'])){
    $ok = true;
    $aErrores['usuario']=validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],30,2,1);
    $aErrores['password']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'],16,3,1);
    foreach($aErrores as $value){
        if(!empty($value)){
        $ok = false;
        }
    }
}
if ($ok ) {
    if(!UsuarioPDO::validarCodNoExiste($_REQUEST['usuario'])){
        $oUsuario = new Usuario($_REQUEST['usuario'], hash("sha256",$_REQUEST['password']), $_REQUEST['descUsuario'], 1, time(), time(), "usuario");
        $_SESSION['usuarioproyectofinal207'] = $oUsuario;
        UsuarioPDO::altaUsuario($oUsuario);
        $_SESSION['paginaEnCurso'] = 'inicioprivado';
        header("Location: ./index.php");
        exit;
    }else{
        $aErrores['usuario'] = "ya existe";
    }
}
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('Location: ./index.php');
    exit;
}
require_once $aVista['layout'];