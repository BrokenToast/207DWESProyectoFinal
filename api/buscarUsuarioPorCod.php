<?php
require_once '../config/confDBPDO.php';
require_once '../model/DBPDO.php';
require_once '../model/usuario.php';
require_once '../model/UsuarioPDO.php';
$usuario=UsuarioPDO::buscarUsuarioPorCod($_REQUEST['codigo']);
if(!is_string($usuario)){
    $aUsuario=[
        "codUsuario"=>$usuario->codUsuario,
        "password"=>$usuario->password,
        "descUsuario"=>$usuario->descUsuario,
        "numAcessos"=>$usuario->numAccesos,
        "fechaUltimaConexion"=>$usuario->fechaHoraUltimaConexion->getTimestamp(),
        "fechaUltimaConexionAnterior"=>$usuario->fechaHoraUltimaConexionAnterior->getTimestamp(),
        "perfil"=>$usuario->perfil
    ];
}else{
    $aUsuario="404";
}
echo json_encode($aUsuario);
header('Content-type: application/json');
header('Content-disposition:  filename=departamento.json');
exit();

