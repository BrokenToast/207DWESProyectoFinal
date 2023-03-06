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
        $aDepartamentos = [];
        foreach($aRespuesta as $departamento){
                array_push($aDepartamentos,new Departamento($departamento['T02_CodDepartamento'], $departamento['T02_DescDepartamento'], $departamento['T02_FechaDeCreacionDepartamento'], $departamento['T02_VolumenDeNegocio'], $departamento['T02_FechaBajaDepartamento']));
        }
        return $aDepartamentos; 
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
    public static function bucarDepartamentoPorDesc(string $descripcion, int $estado=1){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $query="select * from T02_Departamento where T02_DescDepartamento like '%$descripcion%' ".self::queryEstado($estado);
        $aRespuesta=$oConexionDB->executeQuery($query);
        if(!$aRespuesta){
            return "No se a encontrado el departamento";
        }
        $aDepartamentos = [];
        foreach($aRespuesta as $departamento){
                array_push($aDepartamentos,new Departamento($departamento['T02_CodDepartamento'], $departamento['T02_DescDepartamento'], $departamento['T02_FechaDeCreacionDepartamento'], $departamento['T02_VolumenDeNegocio'], $departamento['T02_FechaBajaDepartamento']));
        }  
        return $aDepartamentos;  
}    
    /**
     * bucarDepartamentoPorDescPagiado
     *
     * Metodo que nos permite buscar un departamento a partide de la descripcion del departemnto y el estado, pero nos permite hacer paginacion del resultado.
     * 
     * @param  string $descripcion
     * @param  int $estado
     * @return array|string Devuelve una array con los departamento o string si no hay departamento;
     */
    public static function bucarDepartamentoPorDescPagiado(string $descripcion,int $estado=1){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        
        $cantidadDepartamento=($oConexionDB->executeQuery("select count(*) from T02_Departamento where T02_DescDepartamento like '%$descripcion%'".self::queryEstado($estado)))[0]['count(*)']/4;
        $_SESSION['paginacionDepartamento']['maximo']=(is_float($cantidadDepartamento))?($cantidadDepartamento%10!=0)? floor($cantidadDepartamento)+1 : floor($cantidadDepartamento) : $cantidadDepartamento;
        $_SESSION['paginacionDepartamento']['maximo']+=($_SESSION['paginacionDepartamento']['maximo']==0)? 1:0;
        $query="select * from T02_Departamento where T02_DescDepartamento like '%$descripcion%'".self::queryEstado($estado)." order by T02_CodDepartamento ASC LIMIT 4 OFFSET  ".$_SESSION['paginacionDepartamento']['paginaActual']*4;
        $aRespuesta=$oConexionDB->executeQuery($query);
        if(!$aRespuesta){
            return "No se a encontrado el departamento";
        }
            $aDepartamentos = [];
            foreach($aRespuesta as $departamento){
                    array_push($aDepartamentos,new Departamento($departamento['T02_CodDepartamento'], $departamento['T02_DescDepartamento'], $departamento['T02_FechaDeCreacionDepartamento'], $departamento['T02_VolumenDeNegocio'], $departamento['T02_FechaBajaDepartamento']));
            }  
            return $aDepartamentos;  
    }
    private static function queryEstado(int $estado){
        if($estado<0){
            return " and T02_FechaBajaDepartamento is null ";
        }else if($estado==0){
            return " and T02_FechaBajaDepartamento is not null ";
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
        return $oConexionDB->executeUDI("insert into T02_Departamento values('".$departamento->codDepartamento."','".$departamento->descDepartamento."',unix_timestamp(),'".$departamento->volumenNegocio."',null);");
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
        return $oConexionDB->executeUDI("delete from T02_Departamento where T02_CodDepartamento='$_SESSION[codDepartamentoEnCurso]';");
    }
    /**
     * bajaLogicaDepartamento
     * 
     * Metodo que nos permite realizar una baja logica
     * 
     * @return int Devuelve 1 si se a realizado bien  o 0 si no.
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function bajaLogicaDepartamento(string $codigo){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        return $oConexionDB->executeUDI("update T02_Departamento set T02_FechaBajaDepartamento=unix_timestamp() where T02_CodDepartamento='$codigo' and T02_FechaBajaDepartamento is null;");
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
    public static function modificaDepartamento(Departamento $departamento, string $codigo){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        return $oConexionDB->executeUDI("update T02_Departamento set T02_DescDepartamento='" . $departamento->descDepartamento ."',T02_VolumenDeNegocio=" . $departamento->volumenNegocio ." where T02_CodDepartamento='".$codigo."'");
    }
    /**
     * rehabilitaDepartamento
     * 
     * Nos permite hacer una rehabilitacion logica de un departamento
     * 
     * @return int Devuelve 1 si se a realizado bien  o 0 si no.
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function rehabilitaDepartamento(string $codigo){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        return $oConexionDB->executeUDI("update T02_Departamento set T02_FechaBajaDepartamento=null where T02_CodDepartamento='$codigo' and T02_FechaBajaDepartamento is not null;");
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
        if(!$aRespuesta){
            return true;
        }else{
            return false;
        }
    }
    /**
     * importarDepartamentos
     * 
     * Nos permite importar departamentos que se encuentrasn en un fichero JSON
     * 
     * @param mixed $archivo Archivo que vamos a importar
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function importarDepartamentos($archivo){
        if(!empty($archivo)){
            $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
            $fichero=fopen($archivo['tmp_name'],"r");
            $contenido=(array)json_decode(fread($fichero,$archivo['size']));
            
            foreach ($contenido as $departamento) {
                if(self::validaCodNoExiste($departamento->T02_CodDepartamento)){
                    $oConexionDB->executeUDI("insert into T02_Departamento values('".$departamento->T02_CodDepartamento."','".$departamento->T02_DescDepartamento."',".$departamento->T02_FechaDeCreacionDepartamento.",".$departamento->T02_VolumenDeNegocio.",".($departamento->T02_FechaBajaDepartamento ?? 'null').")");
                }
            }
        }
    }
    /**
     * exportarDepartamento
     * 
     * Metodo que nor permite exportar y descargar un fichero JSON con todos los departamentos.
     * @throws ErrorAPP En caso de que ocurra un error con la consulta o con la conexion de la base de datos
     */
    public static function exportarDepartamento(){
        $oConexionDB = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $respuesta=$oConexionDB->executeQuery("select * from T02_Departamento");
        if(!is_bool($respuesta)){
            echo json_encode($respuesta);
            header('Content-type: application/json');
            header('Content-disposition: attachment; filename=departamento.json');
            exit();
        }
    }
}