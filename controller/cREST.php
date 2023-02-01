<?php
$aRespuesRest=[];
$aRespuesRest += ["estaciones" => Rest::pedirEstaciones()];
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['tiempo'])){
        $oRTiempo=Rest::pedirTemperaturaEstacion($_REQUEST['estacion']);
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

require_once $aVista['layout'];