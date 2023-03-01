<?php
$aErrores = [
    'userName'=>'',
    'descUsuario'=>'',
    'userExist'=>''
];
$ok = "";
$codUsuarioAnterior=$_SESSION['usuarioproyectofinal207']->codUsuario;
$usuario = "";
if(isset($_REQUEST['changeUser'])){
    $ok = true;
    $aErrores['descUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 250, 2, 1);
    foreach($aErrores as $error){
        if(!empty($error)){
            $ok = false;
        }
    }
}
if($ok){
    $_SESSION['usuarioproyectofinal207']->descUsuario=$_REQUEST['descUsuario'];
    UsuarioPDO::modificarUsuario($_SESSION['usuarioproyectofinal207'], $codUsuarioAnterior);
    header("Location: ./index.php");
    exit;
}else{
    $okPassword = false;
    if(empty(validacionFormularios::comprobarAlfaNumerico($_REQUEST['currentPassword']??null,16,3,1)) && !is_null(UsuarioPDO::validadUsuario($_SESSION['usuarioproyectofinal207']->codUsuario,$_REQUEST['currentPassword']))){
        $okPassword = true;
    }
    if(isset($_REQUEST['changePassword']) && $okPassword){
        cambiarPagina('changepassword');
    }
    if(isset($_REQUEST['borrar']) && $okPassword){
        if(UsuarioPDO::borrarUsuario($_SESSION['usuarioproyectofinal207']->codUsuario)==1){
            cambiarPagina('iniciopublico');
        }
    }
}
if(isset($_REQUEST['volver'])){
    cambiarPagina("inicioprivado");  
}
$aRespuestaMiCuenta = [];
$aRespuestaMiCuenta['codUsuario']=$_SESSION['usuarioproyectofinal207']->codUsuario;
$aRespuestaMiCuenta['descUsuario']=$_SESSION['usuarioproyectofinal207']->descUsuario;
$aRespuestaMiCuenta['fechaHoraUltimaConexion']=$_SESSION['usuarioproyectofinal207']->fechaHoraUltimaConexionAnterior->format('d-m-Y H:i:s');
$aRespuestaMiCuenta['numAccesos']=$_SESSION['usuarioproyectofinal207']->numAccesos;
$aRespuestaMiCuenta['perfil'] = $_SESSION['usuarioproyectofinal207']->perfil;
require_once $aVista['layout'];
