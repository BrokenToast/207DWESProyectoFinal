<?php
$aRespuesRest=[];
try{
    $aRespuesRest += ["estaciones" => Rest::pedirEstacionesMeteo()];
}catch(ErrorApp $error){
    $_SESSION['paginaEnCurso'] = "error";
    header('Location: ./index.php');
    exit();
}

if(isset($_REQUEST['volver'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = "inicioprivado";
    header('Location: ./index.php');
    exit;
}

try{
    if(isset($_REQUEST['tiempo'])){
        $oRTiempo=Rest::pedirTemperaturaEstacionMeto($_REQUEST['estacion']);
        $aTiempo = [
            'ubicacion'=>$oRTiempo->ubicacion,
            'presion'=>$oRTiempo->presion,
            'porcentajePrecipitaciones'=>$oRTiempo->porcentajePrecipitaciones,
            'velocidadViento'=>$oRTiempo->velocidadViento,
            'velocidadVientoMaxima'=>$oRTiempo->velocidadVientoMaxima,
            'temperaturaMaxima'=>$oRTiempo->temperaturaMaxima,
            'temperaturaMinima'=>$oRTiempo->temperaturaMinima,
        ];
        $aRespuesRest += ['tiempo'=>$aTiempo];
    }
}catch(ErrorApp $error){
    $_SESSION['paginaEnCurso'] = "error";
    header('Location: ./index.php');
    exit();
}
require_once $aVista['layout'];