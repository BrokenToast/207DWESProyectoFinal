<?php
// Zona general
if(isset($_REQUEST['volver'])){
    cambiarPagina("micuenta");
}
//Zona propia
$aErrores = [];
$ok="";
if(isset($_REQUEST['cambiar'])){
    $ok=true;
    $aErrores['nowPassword']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['nowPassword'],16,3,1);
    $aErrores['newPassword']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['newPassword'],16,3,1);
    $aErrores['repitPassword']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['repitPassword'],16,3,1);
    if($_REQUEST['newPassword']!=$_REQUEST['repitPassword']){
        $aErrores['iguales'] = "Las contraseñas no concuerdan";
    }
    if(hash("sha256",$_REQUEST['newPassword']) == $_SESSION['usuarioproyectofinal207']->password){
        $aErrores['lastPassword'] = "Es igual a la contraseña anterior";
    }
    if(hash("sha256",$_REQUEST['nowPassword']) != $_SESSION['usuarioproyectofinal207']->password){
        $aErrores['nowPassword'] = "Contraseña actual no concuerda";
    }
    foreach($aErrores as $value){
        if(!empty($value)){
        $ok = false;
        }
    }
}
if($ok){
    $_SESSION['usuarioproyectofinal207']->password=hash("sha256",$_REQUEST['newPassword']);
    UsuarioPDO::modificarUsuario($_SESSION['usuarioproyectofinal207'],$_SESSION['usuarioproyectofinal207']->codUsuario);
    cambiarPagina("micuenta");
}
require_once $aVista['layout'];