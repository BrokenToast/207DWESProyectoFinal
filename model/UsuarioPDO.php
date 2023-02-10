<?php
/**
 * UsuarioPDO
 * 
 * Clase que nos permite el mantenimiento de usuarios en la base de datos 
 * 
 * @author luispatb luispatb@gmail.com
 * @version 1.0.0
 * @package model
 */
class UsuarioPDO{
    /**
     * Summary of validadUsuario
     * 
     * Metodo que nos permite validar si un usuario no esta en la base de datos
     * 
     * @param string $codUsuario Nombre del usuario.
     * @param string $password Contraseña del usuario
     * @return Usuario|null Devuelve ull su no
     */
    public static function validadUsuario(string $codUsuario,string $password){
        $conexion = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $aUsuario=$conexion->executeQuery("SELECT * FROM T01_Usuario WHERE T01_CodUsuario='$codUsuario' AND T01_Password=SHA2('$password',256)");
        if(!$aUsuario){
            return null;
        }else{
            $fechaUltimaConexion = time();
            return new Usuario($aUsuario['T01_CodUsuario'],$aUsuario['T01_Password'],$aUsuario['T01_DescUsuario'],$aUsuario['T01_NumConexiones'],$fechaUltimaConexion,$aUsuario['T01_FechaHoraUltimaConexion'],$aUsuario['T01_Perfil']);
        }
    }
    /**
     * Summary of altaUsuario
     * 
     * @param Usuario $usuario
     * @return bool|int
     */
    public static function altaUsuario(Usuario $usuario){
        $conexion = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $aDatosInsert = [[
            $usuario->codUsuario,
            $usuario->password,
            $usuario->descUsuario,
            $usuario->getfechaHoraUltimaConexion()->getTimestamp(),
            $usuario->numAccesos,
            $usuario->perfil,
            0
        ]];
        return $conexion->executeUDI("INSERT INTO T01_Usuario values(?,?,?,?,?,?,?)",$aDatosInsert);
    }
    /**
     * Summary of modificarUsuario
     * 
     * @param Usuario $usuario
     * @param string|null $codUsuario
     * @return bool|int
     */
    public static function modificarUsuario(Usuario $usuario,string $codUsuario=null){
        $conexion = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $aDatosUpdate=[
            "T01_CodUsuario='".$usuario->codUsuario."'",
            "T01_Password='".$usuario->password."'",
            "T01_DescUsuario='".$usuario->descUsuario."'",
            "T01_FechaHoraUltimaConexion='".$usuario->getfechaHoraUltimaConexion()->getTimestamp()."'",
            "T01_NumConexiones='".$usuario->numAccesos."'",
            "T01_Perfil='".$usuario->perfil."'",
        ];
        if(is_null($codUsuario)){
            $codUsuario=$usuario->codUsuario;
        }
        return $conexion->executeUDI("update T01_Usuario set $aDatosUpdate[0],$aDatosUpdate[1],$aDatosUpdate[2],$aDatosUpdate[3],$aDatosUpdate[4],$aDatosUpdate[5]   where T01_CodUsuario='$codUsuario'");
    }
    /**
     * Summary of borrarUsuario
     * 
     * @param string $codUsuario
     * @return bool|int
     */
    public static function borrarUsuario(string $codUsuario){
        $conexion = new DBPDO(DSNMYSQL, USER, PASSWORD);
        return $conexion->executeUDI("delete from T01_Usuario where T01_CodUsuario='$codUsuario'");
    }
    /**
     * Summary of validarCodNoExiste
     * 
     * @param string $codUsuario
     * @return bool
     */
    public static function validarCodNoExiste(string $codUsuario){
        $conexion = new DBPDO(DSNMYSQL, USER, PASSWORD);
        $usuario = $conexion->executeQuery("SELECT T01_CodUsuario FROM T01_Usuario WHERE T01_CodUsuario='$codUsuario'");
        if($usuario){
            return true;
        }else{
            return false;
        }
    }
    // Part 2
    public static function registrarUltimaConexion(){
    }
    public static function buscarUsuarioPorCod(){
    }
    public static function cambiarPasword(){
    }
    public static function crearOpinion(){
    }
    public static function modificarOpinion(){
        
    }
    public static function borrarOpinion(){
    }
    public static function buscarOpinion(){
    }
}