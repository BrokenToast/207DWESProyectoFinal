<?php 
    /*Librerias*/
    require_once('./core/221024ValidacionFormularios.php');
    require_once('./core/IO/ioxml.php');
    /*Config*/
    require_once('./config/confDBPDO.php');
    /*Modelo*/
    require_once('./model/usuario.php');
    require_once('./model/UsuarioPDO.php');
    require_once('./model/DBPDO.php');
    require_once('./model/ErrorApp.php');
    require_once('./model/Tiempo.php');
    require_once('./model/Rest.php');
    /*Controlador*/
    $aControlador = [
        "iniciopublico" => "./controller/cInicioPublico.php",
        "inicioprivado" => "./controller/cInicioPrivada.php",
        "login" => "./controller/cLogin.php",
        "detalles"=>"./controller/cDetalles.php",
        "registrarse"=>"./controller/cRegistrarse.php",
        "micuenta"=>"./controller/cMiCuenta.php",
        "changepassword"=>"./controller/cCambiarPassword.php",
        "wip"=>"./controller/cWIP.php",
        "error"=>"./controller/cError.php",
        "rest"=>"./controller/cREST.php"
    ];
    /*Vista*/
    $aVista = [
        "layout" => "./view/vLayout.php",
        "login" => "./view/vLogin.php",
        "iniciopublico" => "./view/vInicioPublico.php",
        "inicioprivado" => "./view/vInicioPrivada.php",
        "detalles"=>"./view/vDetalles.php",
        "registrarse"=>"./view/vRegistrarse.php",
        "micuenta"=>"./view/vMiCuenta.php",
        "changepassword"=>"./view/vCambiarPassword.php",
        "wip"=>"./view/vWIP.php",
        "error"=>"./view/vError.php",
        "rest"=>"./view/vREST.php"
    ];
?>