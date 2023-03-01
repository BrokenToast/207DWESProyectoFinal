<?php
/**
 * Summary of Usuario
 * 
 * Clase que representa un usuario de la APP
 * 
 * @author Luispatb luispatb@gmail.com
 * @version 1.0.0
 * @package model
 */
class Usuario{
    /**
     * Summary of codUsuario
     * 
     * Codigo del usuario
     * 
     * @var string
     */
    public string $codUsuario;
    /**
     * Summary of password
     * 
     * Contraseña en SHA2 del usuario
     * 
     * @var string
     */
    public string $password;
    /**
     * Summary of descUsuario
     * 
     * Descripcion del usuario
     * 
     * @var string
     */
    public string $descUsuario;
    /**
     * Summary of numAccesos
     * 
     * Numero de accesos a la APP
     * 
     * @var int
     */
    public int $numAccesos;

    public readonly DateTime $fechaHoraUltimaConexion;
    public readonly DateTime $fechaHoraUltimaConexionAnterior;
    /**
     * Summary of perfil
     * 
     * Tiepo de Perfil;
     * 
     * @var string
     */
    public string $perfil;
    /**
     * Summary of __construct
     * 
     * @param string $codUsuario Codigo del usuario
     * @param string $password Contraseña en SHA2 del usuario
     * @param string $descUsuario Descripcion del usuario
     * @param int $numAccesos Numero de accesos a la APP
     * @param int $fechaHoraUltimaConexion Fecha de la conexion actual
     * @param int $fechaHoraUltimaConexionAnterior Fecha de la ultima conexion
     * @param string $perfil Tiepo de Perfil;
     */
    public function __construct(string $codUsuario,string $password,string $descUsuario, int $numAccesos,int $fechaHoraUltimaConexion,int $fechaHoraUltimaConexionAnterior,string $perfil){
        $this->codUsuario=$codUsuario;
        $this->password=$password;
        $this->descUsuario=$descUsuario;
        $this->numAccesos=$numAccesos;
        $fecha = new DateTime();
        $fecha->setTimestamp($fechaHoraUltimaConexion);
        $this->fechaHoraUltimaConexion = $fecha;
        $fechaAnterior = new DateTime();
        $fechaAnterior->setTimestamp($fechaHoraUltimaConexionAnterior);
        $this->fechaHoraUltimaConexionAnterior=$fechaAnterior;
        $this->perfil=$perfil;
    }
}