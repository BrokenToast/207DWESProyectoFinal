<?php
require_once('./model/Tiempo.php');
require_once('./model/ErrorApp.php');
class Rest{
    public static function pedirTemperaturaEstacion(string $codEstacion){
            $datosTiempo = json_decode(file_get_contents("https://opendata.aemet.es/opendata/api/observacion/convencional/datos/estacion/$codEstacion?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJsdWlzcGF0YkBnbWFpbC5jb20iLCJqdGkiOiI4ZmJhZmY1Mi0yMGRjLTRmMGUtYjYyZi0xMTAzNDE1NzY1YjYiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTY3NDk4Mjk2NSwidXNlcklkIjoiOGZiYWZmNTItMjBkYy00ZjBlLWI2MmYtMTEwMzQxNTc2NWI2Iiwicm9sZSI6IiJ9.gxAthEAW4Gp6n3ZYAvKm-R316fuINhmmdEy-75ZfLRI"), true);
            if($datosTiempo['estado']!=200){
                throw new ErrorApp($datosTiempo['estado'], $datosTiempo['descripcion']);
            } else {
                $aValoresTimpo = json_decode(file_get_contents($datosTiempo['datos']), true)[0];
                $hora = new DateTime($aValoresTimpo['fint']);
                return new Tiempo($hora->getTimestamp(), $aValoresTimpo['ubi'] ?? "No hay datos", $aValoresTimpo['pres'] ?? "No hay datos", $aValoresTimpo['prec'] ?? "No hay datos", $aValoresTimpo['vv'] ?? "No hay datos", $aValoresTimpo['vmax'] ?? "No hay datos", $aValoresTimpo['tamin'] ?? "No hay datos", $aValoresTimpo['tamax'] ?? "No hay datos");
            }
        }
    public static function pedirEstaciones(){
        $nombreEstaciones = [];
        $datosEstaciones=json_decode(file_get_contents("https://opendata.aemet.es/opendata/api/valores/climatologicos/inventarioestaciones/todasestaciones?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJsdWlzcGF0YkBnbWFpbC5jb20iLCJqdGkiOiI4ZmJhZmY1Mi0yMGRjLTRmMGUtYjYyZi0xMTAzNDE1NzY1YjYiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTY3NDk4Mjk2NSwidXNlcklkIjoiOGZiYWZmNTItMjBkYy00ZjBlLWI2MmYtMTEwMzQxNTc2NWI2Iiwicm9sZSI6IiJ9.gxAthEAW4Gp6n3ZYAvKm-R316fuINhmmdEy-75ZfLRI"),true);
        if($datosEstaciones['estado']!=200){
            throw new ErrorApp($datosEstaciones['estado'], $datosEstaciones['descripcion']);
        }else{
            $aEstaciones = iconv("ISO-8859-15","UTF-8",file_get_contents($datosEstaciones['datos']));
            $aStaciones = json_decode($aEstaciones,true);
            foreach ($aStaciones as $estacion) {
                $nombreEstaciones+=[$estacion['nombre']=>$estacion['indicativo']];
            }
            return $nombreEstaciones;
        }
    }
}
