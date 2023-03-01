<?php
$ok = "";
if(!empty($_REQUEST)){
    $ok = true;
    if(!UsuarioPDO::validarCodNoExiste($_REQUEST['usuario'])){
        $aErrores['usuario']="El usuario ya existe";
    }
    $aErrores['usuario']=validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],30,2,1);
    $aErrores['password']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'],16,3,1);
    $aErrores['descUsuario']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'],250,2,1);
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
        cambiarPagina('inicioprivado');
    }else{
        $aErrores['usuario'] = "ya existe";
    }
}
if(isset($_REQUEST['volver'])){
    cambiarPagina("login");
}
require_once $aVista['layout'];