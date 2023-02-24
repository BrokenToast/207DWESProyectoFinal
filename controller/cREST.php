<?php
$aRespuesRest=[];
try{
    $aRespuesRest += ["estaciones" => Rest::pedirEstacionesMeteo()];
}catch(ErrorApp $error){
    cambiarPagina("error");
}

if(isset($_REQUEST['volver'])){
    cambiarPagina("inicioprivado");
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
    cambiarPagina("error");
}
require_once $aVista['layout'];