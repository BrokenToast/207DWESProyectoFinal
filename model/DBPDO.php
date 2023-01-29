<?php
class DBPDO{
    /**
     * Clase que nos permite gestionar una base de datos.
     * 
     */
    public string $dsn;
    public string $user;
    public string $password;
    private PDO $oConexionDB;

    public function __construct($dsn,$user,$password){
        $this->dsn=$dsn;
        $this->user=$user;
        $this->password = $password;
    }
    /**
     * Metodo que no permite lanzar un quiery y nos devuelve la informacion en una array
     * @param string $query Query que se va a ejecutar.
     * @throws ErrorLoginLogoff Se lanza cuando hay un error con el query
     * @return array devuelve una array con la informacion del Quer(Formato: [[tupla1],[tupla..],[tupla..]]) o [tupla] y si no hay resultado devuelve false. 
     */
    public function executeQuery(string $query,array $parametros=null){
        try{    
            if(is_null($parametros) || count($parametros)==0){
                $this->__wakeup();
                $oResultado=$this->oConexionDB->query($query);
                if($oResultado->rowCount()>1){
                    $aresultado = [];
                    $tupla=$oResultado->fetch(PDO::FETCH_ASSOC);
                    while(!is_bool($tupla)){
                        array_push($aresultado, $tupla);
                        $tupla=$oResultado->fetch(PDO::FETCH_ASSOC);
                    }
                    return $aresultado;
                }else{
                    return $oResultado->fetch(PDO::FETCH_ASSOC);
                }
            }else{
                $oResultado=$this->oConexionDB->prepare($query);
                if(is_array($parametros[0])){
                    foreach($parametros as $tupla){
                        $oResultado->execute($tupla);
                    }
                }else{
                    $oResultado->execute($parametros);
                }
            }
        }catch(Error $error){
            new ErrorLoginLogoff($error->getCode(),$error->getMessage());
        }finally{
            unset($this->oConexionDB);
        }
    }
    /**
     * executeUDI: Sirve para ejecutar un inserción o update o delete:
     * En la inserción podemos hacer un query paremetizado esto nos abre la posibilidad para pasarle una array que contenga datos sobre la inserción
     * pero debe respetar uno de los siguientes formatos la array de datos:
     * Requisitos: la array de datos contiene otras arraya que almacenan las tuplas.
     * 1º forma
     * Insert:
     * insert into prueba1 VALUES(:codigo,:nombre,:apellidos,:edad)
     * 
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
     * 
     * 2º Forma
     * Insert:
     * insert into prueba1 VALUES(?,?,?,?)
     * 
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
     * @param string $UDI Inserto update o delete 
     * @param array|null $datos Datos del insert.
     * @throws ErrorLoginLogoff 
     * @return bool|int Devuelve el numero de tuplas afectadas.
     */
    public function executeUDI(string $UDI,array $datos=null){
        try{
            $this->__wakeup();
            if(is_null($datos)){
                return $oResultado=$this->oConexionDB->exec($UDI);
            }else{
                if(is_array($datos[0])){
                    $prepareUDI=$this->oConexionDB->prepare($UDI);
                    foreach($datos as $tupla){
                        $prepareUDI->execute($tupla);
                    }
                }
            }
        }catch(PDOException $error){
            new ErrorLoginLogoff($error->getCode(),$error->getMessage());
        }finally{
            unset($this->oConexionDB);
        }
    }
    public function __wakeup(){
        $this->oConexionDB = new PDO($this->dsn,$this->user,$this->password);
    }
}