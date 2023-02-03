<?php
require_once("Departamento.php");
/**
 * DepartamentoPDO
 * 
 * Clase que nos permite gestionar los departamento en la base de datos
 * 
 * @author luispatb luispatb@gmail.com
 * @version 1.0.0
 * @package model
 */
class DepartamentoPDO{
    /**
     * Summary of buscarDepartamentoPorCod
     * 
     * Metodo que nos permite buscar un departamento a partide del codigo del departemnto
     * 
     * @param string $codigo Codigo del departamento
     * @return Departamento|string Devuelve departamento y si no lo encuentra en un mensaje;
     */
    public static function buscarDepartamentoPorCod(string $codigo){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $aRespuesta=$oConexionDB->executeQuery("select * from T02_Departamento where T02_CodDepartamento='$codigo'");
        if(!$aRespuesta){
            return "No se a encontrado el departamento";
        }
        if(isset($aRespuesta["T02_CodDepartamento"])){
            return new Departamento($aRespuesta['T02_CodDepartamento'], $aRespuesta['T02_DescDepartamento'], $aRespuesta['T02_FechaDeCreacionDepartamento'], $aRespuesta['T02_VolumenDeNegocio'], $aRespuesta['T02_FechaBajaDepartamento']);
        }else{
            $aDepartamentos = [];
            foreach($aRespuesta as $departamento){
                    array_push($aDepartamentos,new Departamento($departamento['T02_CodDepartamento'], $departamento['T02_DescDepartamento'], $departamento['T02_FechaDeCreacionDepartamento'], $departamento['T02_VolumenDeNegocio'], $departamento['T02_FechaBajaDepartamento']));
            }   
        } 
    }
    /**
     * Summary of bucarDepartamentoPorDesc
     * 
     * Metodo que nos permite buscar un departamento a partide de la descripcion del departemnto
     * 
     * @param string $descrpcion Descripcion del departamento
     * @return Departamento|string Devuelve departamento y si no lo encuentra en un mensaje;
     */
    public static function bucarDepartamentoPorDesc(string $descrpcion){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $aRespuesta=$oConexionDB->executeQuery("select * from T02_Departamento where T02_DescDepartamento like '%$descrpcion%';");
        var_dump($aRespuesta);
        if(!$aRespuesta){
            return "No se a encontrado el departamento";
        }
        if(isset($aRespuesta["T02_CodDepartamento"])){
            return new Departamento($aRespuesta['T02_CodDepartamento'], $aRespuesta['T02_DescDepartamento'], $aRespuesta['T02_FechaDeCreacionDepartamento'], $aRespuesta['T02_VolumenDeNegocio'], $aRespuesta['T02_FechaBajaDepartamento']);
        }else{
            $aDepartamentos = [];
            foreach($aRespuesta as $departamento){
                    array_push($aDepartamentos,new Departamento($departamento['T02_CodDepartamento'], $departamento['T02_DescDepartamento'], $departamento['T02_FechaDeCreacionDepartamento'], $departamento['T02_VolumenDeNegocio'], $departamento['T02_FechaBajaDepartamento']));
            }   
        }
    }
    public static function altaDepartamento(Departamento $departamento){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);

    }
    public static function bajaFisicaDepartamento(string $codigo){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);

    }
    public static function bajaLogicaDepartamento(string $codigo){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);

    }
    public static function modificaDepartamento(Departamento $departamento){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);

    }
    public static function rehabilitaDepartamento(Departamento $departamento){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);

    }
    public static function validaCodNoExiste(string $codigo){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);

    }
}