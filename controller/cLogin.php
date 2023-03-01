<?php
if (isset($_REQUEST['iniciar'])) {
    $ok = true;
    $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 30, 2, 1);
    $aErrores['password'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'], 16, 3, 1);
    foreach ($aErrores as $value) {
        if (!empty($value)) {
            $ok = false;
        }
    }
    if ($ok) {
        $oUsuario = UsuarioPDO::validadUsuario($_REQUEST['usuario'], $_REQUEST['password']);
        if (!is_null($oUsuario)){
            $_SESSION['usuarioproyectofinal207'] = $oUsuario;
            $oUsuario->numAccesos += 1;
            UsuarioPDO::modificarUsuario($oUsuario);
            cambiarPagina('inicioprivado');
        }
    }
}
if(isset($_REQUEST['registrarse'])){
    cambiarPagina('registrarse');
}
if(isset($_REQUEST['volver'])){
    cambiarPagina("iniciopublico");
}
require_once $aVista['layout'];