<?php
    require_once('./model/Tiempo.php');
class Rest{
    public static function pedirTemperaturaEstacion(string $ubicacion){
        $contexto = array(
          'http'=>array(
            'method'=>"GET",
            'header' => 'Content-Type: application/json; charset=utf-8'
          )
        );
        $codEstacion="";
        $nombreEstaciones = [];
        $datosEstaciones=json_decode(file_get_contents("https://opendata.aemet.es/opendata/api/valores/climatologicos/inventarioestaciones/todasestaciones?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJsdWlzcGF0YkBnbWFpbC5jb20iLCJqdGkiOiI4ZmJhZmY1Mi0yMGRjLTRmMGUtYjYyZi0xMTAzNDE1NzY1YjYiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTY3NDk4Mjk2NSwidXNlcklkIjoiOGZiYWZmNTItMjBkYy00ZjBlLWI2MmYtMTEwMzQxNTc2NWI2Iiwicm9sZSI6IiJ9.gxAthEAW4Gp6n3ZYAvKm-R316fuINhmmdEy-75ZfLRI"),true);
        $aEstaciones = iconv("ISO-8859-15","UTF-8",file_get_contents($datosEstaciones['datos']));
        $aStaciones = json_decode($aEstaciones,true);
        foreach ($aStaciones as $estacion) {
            if(strtolower($estacion['nombre'])==strtolower($ubicacion)){
                $codEstacion=$estacion['indicativo'];
            }
            array_push($nombreEstaciones,$estacion['nombre']);
        }
        if (!empty($codEstacion)) {
            $datosTiempo = json_decode(file_get_contents("https://opendata.aemet.es/opendata/api/observacion/convencional/datos/estacion/$codEstacion?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJsdWlzcGF0YkBnbWFpbC5jb20iLCJqdGkiOiI4ZmJhZmY1Mi0yMGRjLTRmMGUtYjYyZi0xMTAzNDE1NzY1YjYiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTY3NDk4Mjk2NSwidXNlcklkIjoiOGZiYWZmNTItMjBkYy00ZjBlLWI2MmYtMTEwMzQxNTc2NWI2Iiwicm9sZSI6IiJ9.gxAthEAW4Gp6n3ZYAvKm-R316fuINhmmdEy-75ZfLRI"), true);
            $aValoresTimpo = json_decode(file_get_contents($datosTiempo['datos']), true)[0];
            $hora = new DateTime($aValoresTimpo['fint']);
            return new Tiempo($hora->getTimestamp(), $aValoresTimpo['ubi'], $aValoresTimpo['pres'], $aValoresTimpo['prec'], $aValoresTimpo['vv'], $aValoresTimpo['vmax'], $aValoresTimpo['tamin'], $aValoresTimpo['tamax']);
        }else{
            return $nombreEstaciones;
        }
    }
}
