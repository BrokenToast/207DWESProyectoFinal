<?php
/**
 * DBPDO
 * 
 * Clase que nos permite hacer un manteimmiento a un base de datos
 * 
 * @author Luispatb luispatb@gmail.com
 * @version 1.0.0
 * @package model
 */
class DBPDO{
    /**
     * Summary of dsn
     * 
     * @var string
     */
    public string $dsn;
    /**
     * Summary of user
     * 
     * Usuario de la base de datos
     * 
     * @var string
     */
    public string $user;
    /**
     * Summary of password
     * 
     * Contraseña del usuario.
     * 
     * @var string
     */
    public string $password;
    private PDO $oConexionDB;

    /**
     * Summary of __construct
     * 
     * @param mixed $dsn
     * @param mixed $user Usuario de la base de datos
     * @param mixed $password Contraseña del usuario.
     */
    public function __construct($dsn,$user,$password){
        $this->dsn=$dsn;
        $this->user=$user;
        $this->password = $password;
    }
    /**
     * ExecuteQuery
     * 
     * Metodo que no permite lanzar un quiery y nos devuelve la informacion en una array
     * 
     * @param string $query Query que se va a ejecutar.
     * @throws ErrorApp Se lanza cuando hay un error con el query
     * @return array devuelve una array con la informacion del Quer(Formato: [[tupla1],[tupla..],[tupla..]]) y si no hay resultado devuelve false. 
     */
    public function executeQuery(string $query,array $parametros=null){
        $this->__wakeup();
        $aresultado = [];
        try{
            $oresultado=$this->oConexionDB->query($query);
            $aresultado=$oresultado->fetchAll();
        }catch(PDOException $error){
            throw new ErrorApp($error->getCode(),$error->getMessage(),$error->getFile(),$error->getLine(),$_SESSION['paginaEnCurso']);
        }finally{
            unset($oPrepareSQL);
        }
        return (empty($aresultado))?false:$aresultado;
    }
    /**
     * ExecuteUDI
     * 
     * Sirve para ejecutar un inserción o update o delete:
     * En la inserción podemos hacer un query paremetizado esto nos abre la posibilidad para pasarle una array que contenga datos sobre la inserción
     * pero debe respetar uno de los siguientes formatos la array de datos:
     * Requisitos: la array de datos contiene otras arraya que almacenan las tuplas.
     * 
     * 1º forma
     * Insert:
     * insert into prueba1 VALUES(:codigo,:nombre,:apellidos,:edad)
     * Datos:
     * [[
     * ":codigo"=>"kjfh",
     * ":nombre"=>"ernesto",
     * ":apellidos"=>"algo",
     * ":edad"=>"54455"
     * ],
     * [
     * ":codigo"=>"hjj",
     * ":nombre"=>"erpepe",
     * ":apellidos"=>"nose",
     * ":edad"=>"22"
     * ]
     * ];
     * 2º Forma
     * Insert:
     * insert into prueba1 VALUES(?,?,?,?)
     * Datos:
     * [
     *     [
     *         "cdfg",
     *         "Alex",
     *         "Prieto",
     *         20
     *     ],
     *     [
     *         "kkk",
     *         "Raul",
     *         "nose",
     *         21
     *     ]
     * ];
     * 
     * @param string $udi Inserto update o delete 
     * @param array|null $datos Datos del insert.
     * @throws ErrorApp
     * @return bool|int Devuelve el numero de tuplas afectadas.
     */
    public function executeUDI(string $udi,array $datos=null){
        $this->__wakeup();
        try{
            if(is_null($datos)){
                return $oResultado=$this->oConexionDB->exec($udi);
            }else{
                if(is_array($datos[0])){
                    $prepareUDI=$this->oConexionDB->prepare($udi);
                    foreach($datos as $tupla){
                        $prepareUDI->execute($tupla);
                    }
                }
            }
        }catch(PDOException $error){
            throw new ErrorApp($error->getCode(),$error->getMessage(),$error->getFile(),$error->getLine(),$_SESSION['paginaEnCurso']);
        }finally{
            unset($this->oConexionDB);
        }
    }
    public function __wakeup(){
        $this->oConexionDB = new PDO($this->dsn,$this->user,$this->password);
    }
}