<?php
/**
 * Departamento
 * 
 * Clase que defini un Departamento
 * 
 * @author luispatb luispatb@gmail.com
 * @version 1.0.0
 * @package model
 */
class Departamento{
    /**
     * codDepartamento
     * 
     * Codigo departamento
     * 
     * @var string
     */
    public readonly string $codDepartamento;
    /**
     * descDepartamento
     * 
     * Descripcion del departamento
     * 
     * @var string
     */
    public readonly string $descDepartamento;
    /**
     * fechaCreacionDepartamento
     * 
     * Fecha de Creacion del departamento
     * 
     * @var DateTime
     */
    public readonly DateTime $fechaCreacionDepartamento;
    /**
     * volumenNegocio
     * 
     * Volumen del negocio
     * 
     * @var float
     */
    public readonly float $volumenNegocio;
    /**
     * fechaBajaDepartamento
     * 
     * Fecha de baja logica del deparamento(TiemStamp)
     * 
     * @var int|null
     */
    public readonly int|null $fechaBajaDepartamento;
    /**
     * Summary of __construct
     * 
     * @param string $codDepartamento Codigo departamento
     * @param string $descDepartamento Descripcion del departamento
     * @param int $fechaCreacionDepartamento Timestap de la creación del departament
     * @param int $volumenNegocio Volumen del negocio
     * @param int|null $fechaBajaDepartamento Timestap de la baja logica del departamento
     */
    public function __construct(string $codDepartamento, string $descDepartamento,int $fechaCreacionDepartamento,float $volumenNegocio,int $fechaBajaDepartamento=null){
        $this->codDepartamento=$codDepartamento;
        $this->descDepartamento=$descDepartamento;
        $fechaCreacion = new DateTime();
        $fechaCreacion->setTimestamp($fechaCreacionDepartamento);
        $this->fechaCreacionDepartamento=$fechaCreacion;
        $this->volumenNegocio=$volumenNegocio;
        $this->fechaBajaDepartamento=$fechaBajaDepartamento;
    }
}