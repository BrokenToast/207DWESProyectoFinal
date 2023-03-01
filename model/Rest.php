<?php
require_once('./model/Tiempo.php');
require_once('./model/ErrorApp.php');
/**
 * Rest
 * 
 * Nos Permite hacer llamadas a un un web service 
 * 
 * @author Luispatb luispatb@gmail.com
 * @version 1.0.0
 * @package model
 * 
 */
class Rest{
    /**
     * pedirTemperaturaEstacion
     * 
     * Metodo que nos permite pedir informacion a la AEMET sobre una estacion Meteorologica
     * 
     * @param string $codEstacion Codigo de la estación Meteorologica
     * @throws ErrorApp Encaso de que occurra algun error al extraer la información de la AEMET
     * @return Tiempo Objeto que devuelve el tiempo de la estacion pedida.
     */
    public static function pedirTemperaturaEstacionMeto(string $codEstacion){
            //Pedimos la información AEMEt y nos duelve un JSON con informacion sobre la respuesta, la descodigicamos en un array asociativo.
            $datosTiempo = json_decode(file_get_contents("https://opendata.aemet.es/opendata/api/observacion/convencional/datos/estacion/$codEstacion?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJsdWlzcGF0YkBnbWFpbC5jb20iLCJqdGkiOiI4ZmJhZmY1Mi0yMGRjLTRmMGUtYjYyZi0xMTAzNDE1NzY1YjYiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTY3NDk4Mjk2NSwidXNlcklkIjoiOGZiYWZmNTItMjBkYy00ZjBlLWI2MmYtMTEwMzQxNTc2NWI2Iiwicm9sZSI6IiJ9.gxAthEAW4Gp6n3ZYAvKm-R316fuINhmmdEy-75ZfLRI"), true);
            if($datosTiempo['estado']!=200){
                // Si la respuesta tiene un error lanza un ErrorApp
                throw new ErrorApp($datosTiempo['estado'], $datosTiempo['descripcion'],"https://opendata.aemet.es/opendata/api/observacion/convencional/datos/estacion/$codEstacion?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJsdWlzcGF0YkBnbWFpbC5jb20iLCJqdGkiOiI4ZmJhZmY1Mi0yMGRjLTRmMGUtYjYyZi0xMTAzNDE1NzY1YjYiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTY3NDk4Mjk2NSwidXNlcklkIjoiOGZiYWZmNTItMjBkYy00ZjBlLWI2MmYtMTEwMzQxNTc2NWI2Iiwicm9sZSI6IiJ9.gxAthEAW4Gp6n3ZYAvKm-R316fuINhmmdEy-75ZfLRI",0,$_SESSION['paginaEnCurso']);;
            } else {
                //descoficamos los datos del la estacion;
                $aValoresTimpo = json_decode(iconv("ISO-8859-15","UTF-8",file_get_contents($datosTiempo['datos'])),true)[0];
                // Creamos un datetime con la fecha de los datos.
                $hora = new DateTime($aValoresTimpo['fint']);
                // Creamos el objeto Tiempo y lo devolvemos.
                return new Tiempo($hora, $aValoresTimpo['ubi'] ?? null, $aValoresTimpo['pres'] ?? null, $aValoresTimpo['prec'] ?? null, $aValoresTimpo['vv'] ?? null, $aValoresTimpo['vmax'] ?? null, $aValoresTimpo['tamin'] ?? null, $aValoresTimpo['tamax'] ?? null);
            }
        }
    /**
     * pedirEstacionesMeteo
     * 
     * Que nos permite Pedir todas las Estaciones que tiene la AEMET en España
     * 
     * @throws ErrorApp Encaso de que occurra algun error al extraer la información de la AEMET
     * @return array Devuelve una array[nombreEstación => codigoEstacion]
     */
    public static function pedirEstacionesMeteo(){
        $nombreEstaciones = [];
        //Pedimos la información AEMEt y nos duelve un JSON con informacion sobre la respuesta, la descodigicamos en un array asociativo.
        $datosEstaciones=json_decode(file_get_contents("https://opendata.aemet.es/opendata/api/valores/climatologicos/inventarioestaciones/todasestaciones?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJsdWlzcGF0YkBnbWFpbC5jb20iLCJqdGkiOiI4ZmJhZmY1Mi0yMGRjLTRmMGUtYjYyZi0xMTAzNDE1NzY1YjYiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTY3NDk4Mjk2NSwidXNlcklkIjoiOGZiYWZmNTItMjBkYy00ZjBlLWI2MmYtMTEwMzQxNTc2NWI2Iiwicm9sZSI6IiJ9.gxAthEAW4Gp6n3ZYAvKm-R316fuINhmmdEy-75ZfLRI"),true);
        if($datosEstaciones['estado']!=200){
            // Si la respuesta tiene un error lanza un ErrorApp
            throw new ErrorApp($datosEstaciones['estado'], $datosEstaciones['descripcion'],"https://opendata.aemet.es/opendata/api/valores/climatologicos/inventarioestaciones/todasestaciones?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJsdWlzcGF0YkBnbWFpbC5jb20iLCJqdGkiOiI4ZmJhZmY1Mi0yMGRjLTRmMGUtYjYyZi0xMTAzNDE1NzY1YjYiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTY3NDk4Mjk2NSwidXNlcklkIjoiOGZiYWZmNTItMjBkYy00ZjBlLWI2MmYtMTEwMzQxNTc2NWI2Iiwicm9sZSI6IiJ9.gxAthEAW4Gp6n3ZYAvKm-R316fuINhmmdEy-75ZfLRI",0,$_SESSION['paginaEnCurso']);
        }else{
            // Sacamos la lista de las Estaciones Meteorologico. 
            // Cambiamos la codifacion de la AEMET a UFT-8 con ICONV ,https://www.php.net/manual/es/function.iconv
            // Descodificamos de JSON a un array asociativo.
            $aStaciones = json_decode(iconv("ISO-8859-15","UTF-8",file_get_contents($datosEstaciones['datos'])),true);
            foreach ($aStaciones as $estacion) {
                // Recorremos la array de Estaciones y metemos en otra el nobre y el identifacor.
                $nombreEstaciones+=[$estacion['nombre']=>$estacion['indicativo']];
            }
            return $nombreEstaciones;
        }
    }
    public static function generacionElectricaAyer(){
        $fechaAyer=new DateTime();
        $fechaAyer->setTimestamp($fechaAyer->getTimestamp()-8640000);
        $sfechaAyer=$fechaAyer->format('Y-m-d');
        return json_decode(file_get_contents("https://apidatos.ree.es/es/datos/generacion/estructura-generacion?start_date=".$sfechaAyer."T00:00&end_date=".$sfechaAyer."T23:59&time_trunc=day&tecno_select=all"));
    }
}