<?php
require_once '../config/confDBPDO.php';
require_once '../model/DBPDO.php';
require_once '../model/Usuario.php';
require_once '../model/UsuarioPDO.php';
require_once('../model/ErrorApp.php');
// http://192.168.3.202/207DWESproyectoDWES/207DWESProyectoFinal/api/buscarUsuarioPorDesc.php?descripcion=u
$aRespuesta=UsuarioPDO::buscarUsuarioPorDesc($_REQUEST['descripcion']);
if(!is_string($aRespuesta)){
    $aUsuario=[];
    foreach ($aRespuesta as $usuario) {
        array_push($aUsuario,[
            "codUsuario"=>$usuario->codUsuario,
            "password"=>$usuario->password,
            "descUsuario"=>$usuario->descUsuario,
            "numAcessos"=>$usuario->numAccesos,
            "fechaUltimaConexion"=>$usuario->fechaHoraUltimaConexion->getTimestamp(),
            "fechaUltimaConexionAnterior"=>$usuario->fechaHoraUltimaConexionAnterior->getTimestamp(),
            "perfil"=>$usuario->perfil
        ]);
    }
}else{
    $aUsuario="404";
}
echo json_encode($aUsuario);
header('Content-type: application/json');
header('Content-disposition:  filename=departamento.json');
exit();

