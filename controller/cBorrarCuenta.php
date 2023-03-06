<?php
if(isset($_REQUEST['volver'])){
    cambiarPagina("micuenta");
}
if(isset($_REQUEST['eliminar'])){
    $ok=true;
    $aErrores['nowPassword']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['nowPassword'],16,3,1);
    $aErrores['repetPassword']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['repetPassword'],16,3,1);
    if(hash("sha256",$_REQUEST['nowPassword']) != $_SESSION['usuarioproyectofinal207']->password){
        $aErrores['nowPassword'] = "Contraseña actual no concuerda";
    }
    if($_REQUEST['nowPassword']!=$_REQUEST['repetPassword']){
        $aErrores['iguales'] = "No son iguales";
    }
    foreach($aErrores as $value){
        if(!empty($value)){
        $ok = false;
        }
    }
    if($ok){
        UsuarioPDO::borrarUsuario($_SESSION['usuarioproyectofinal207']->codUsuario);
        cambiarPagina("iniciopublico");
    }
}
require_once $aVista['layout'];