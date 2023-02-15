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
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
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
            return $aDepartamentos; 
        } 
    }
    /**
     * Summary of bucarDepartamentoPorDesc
     * 
     * Metodo que nos permite buscar un departamento a partide de la descripcion del departemnto
     * 
     * @param string $descrpcion Descripcion del departamento
     * @return Departamento|string Devuelve departamento y si no lo encuentra en un mensaje;
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function bucarDepartamentoPorDesc(string $descrpcion, int $estado=null){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        if($estado>0){
            $aRespuesta=$oConexionDB->executeQuery("select * from T02_Departamento where T02_DescDepartamento like '%$descrpcion%';");
        }else if($estado==0){
            $aRespuesta=$oConexionDB->executeQuery("select * from T02_Departamento where T02_DescDepartamento like '%$descrpcion%'and T02_FechaBajaDepartamento is not null;");
        }else{
            $aRespuesta=$oConexionDB->executeQuery("select * from T02_Departamento where T02_DescDepartamento like '%$descrpcion%'and T02_FechaBajaDepartamento is null;");
        }
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
            return $aDepartamentos;  
        }
    }
    public static function buscarDepartamentoPorDescPagiado(string $descripcion,int $estado=null){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        if($estado>0){
            $aRespuesta=$oConexionDB->executeQuery("select * from T02_Departamento where T02_DescDepartamento like '%$descripcion%' order by T02_CodDepartamento ASC LIMIT 4 OFFSET 1;");
        }else if($estado==0){
            $aRespuesta=$oConexionDB->executeQuery("select * from T02_Departamento where T02_DescDepartamento like '%$descripcion%'and T02_FechaBajaDepartamento is not null order by T02_CodDepartamento ASC LIMIT 4 OFFSET 1;");
        }else{
            $aRespuesta=$oConexionDB->executeQuery("select * from T02_Departamento where T02_DescDepartamento like '%$descripcion%'and T02_FechaBajaDepartamento is null order by T02_CodDepartamento ASC LIMIT 4 OFFSET 1;");
        }
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
            return $aDepartamentos;  
        }

    }
    /**
     * altaDepartamento
     * 
     * Nos permite añadir un nuevo departamento
     * 
     * @param Departamento $departamento Departamento a añadir
     * @return int Devuelve 1 si se ha añadido bien o 0 si se no ha añadido.
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function altaDepartamento(Departamento $departamento){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        return $oConexionDB->executeUDI("insert into T02_Departamento values('".$departamento->codDepartamento."','".$departamento->descDepartamento."',unix_timestamp(),'".$departamento->volumenNegocio."',$departamento->fechaBajaDepartamento);");
    }
    /**
     * bajaFisicaDepartamento
     * 
     * Metodo que nos permite realizar una baja fisica(Eliminar el departamento)
     * 
     * @return int Devuelve 1 si se a eliminado bien  o 0 si no.
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function bajaFisicaDepartamento(){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        return $oConexionDB->executeUDI("delete from T02_Departamento where T02_CodDepartamento='$_SESSION[codDepartamentoEnCurso]' and T02_FechaBajaDepartamento is null;");

    }
    /**
     * bajaLogicaDepartamento
     * 
     * Metodo que nos permite realizar una baja logica
     * 
     * @return int Devuelve 1 si se a realizado bien  o 0 si no.
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function bajaLogicaDepartamento(){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        return $oConexionDB->executeUDI("update T02_Departamento set T02_FechaBajaDepartamento=unix_timestamp() where T02_CodDepartamento='$_SESSION[codDepartamentoEnCurso]' and T02_FechaBajaDepartamento is null;");
    }
    /**
     * modificaDepartamento
     * 
     * Metodo que nos permite modificar un departamento
     * 
     * @param Departamento $departamento Departamento modificado
     * @return int Devuelve 1 si se a realizado bien  o 0 si no.
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function modificaDepartamento(Departamento $departamento){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        return $oConexionDB->executeUDI("update T02_Departamento set T02_CodDepartamento='" . $departamento->codDepartamento . "',T02_DescDepartamento='" . $departamento->descDepartamento ."',T02_VolumenDeNegocio=" . $departamento->volumenNegocio ." where T02_CodDepartamento='" . $_SESSION['codDepartamentoEnCurso']."'");
        
    }
    /**
     * rehabilitaDepartamento
     * 
     * Nos permite hacer una rehabilitacion logica de un departamento
     * 
     * @return int Devuelve 1 si se a realizado bien  o 0 si no.
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function rehabilitaDepartamento(){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        return $oConexionDB->executeUDI("update T02_Departamento set T02_FechaBajaDepartamento=null where T02_CodDepartamento='$_SESSION[codDepartamentoEnCurso]' and T02_FechaBajaDepartamento is not null;");
    }
    /**
     * validaCodNoExiste
     * 
     * Nos permite comprobar el codigo pasado ya existe.
     * 
     * @param string $codigo Codigo de departamento a comprobar
     * @return bool Devuelve true si no existe y false si existe.
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function validaCodNoExiste(string $codigo){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $aRespuesta = $oConexionDB->executeQuery("select T02_CodDepartamento from T02_Departamento where T02_CodDepartamento='$codigo';");
        if(count($aRespuesta)!=0 && isset($aRespuesta['T02_CodDepartamento'])){
            return false;
        }else{
            return true;
        }
    }
    public static function importarDepartamentos($archivo){
        var_dump($archivo);
    }
    public static function exportarDepartamento(){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $archivoJSON=tmpfile();
        fwrite($archivoJSON,json_encode($oConexionDB->executeQuery("select * from T02_Departamento")));
        header('Content-type: application/json');
        header('Content-disposition: attachment; filename=departamento.json');
        echo json_encode($oConexionDB->executeQuery("select * from T02_Departamento"));
        exit();
    }
}