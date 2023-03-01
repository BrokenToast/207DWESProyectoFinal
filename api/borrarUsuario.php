<?php
require_once '../config/confDBPDO.php';
require_once '../model/DBPDO.php';
require_once '../model/usuario.php';
require_once '../model/UsuarioPDO.php';
//http://192.168.3.202/207DWESproyectoDWES/207DWESProyectoFinal/api/borrarUsuario.php?codigo=david&confirm=1
if($_REQUEST['confirm']){
    if(UsuarioPDO::borrarUsuario($_REQUEST['codigo'])){
        echo json_encode("200");
    }else{
        echo json_encode("404");
    }
}
header('Content-type: application/json');
header('Content-disposition:  filename=departamento.json');