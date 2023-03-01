<?php
require_once '../config/confDBPDO.php';
require_once '../model/DBPDO.php';
require_once '../model/usuario.php';
require_once '../model/UsuarioPDO.php';
require_once '../core/221024ValidacionFormularios.php';
//http://192.168.3.202/207DWESproyectoDWES/207DWESProyectoFinal/api/cambiarPasswordUsuario.php?codigo=david&newPassword=1234
$error=validacionFormularios::comprobarAlfaNumerico($_REQUEST['newPassword'],16,3,1);
if(empty($error)){
    if(UsuarioPDO::cambiarPasword($_REQUEST['codigo'],$_REQUEST['newPassword'])){
        echo json_encode("200");
    }else{
        echo json_encode("404");
    }
}else{
    echo json_encode($error);
}
header('Content-type: application/json');
header('Content-disposition:  filename=departamento.json');