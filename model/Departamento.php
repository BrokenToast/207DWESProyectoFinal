<?php
class Departamento{
    public readonly string $codDepartamento;
    public readonly string $descDepartamento;
    public readonly DateTime $fechaCreacionDepartamento;
    public readonly int $volumenNegocio;
    public readonly DateTime $fechaBajaDepartamento;
    
    public function __construct($codDepartamento,$descDepartamento,int $fechaCreacionDepartamento,int $volumenNegocio,int $fechaBajaDepartamento=null){
        $this->codDepartamento=$codDepartamento;
        $this->descDepartamento=$descDepartamento;
        $fechaCreacion = new DateTime();
        $fechaCreacion->setTimestamp($fechaCreacionDepartamento);
        $this->fechaCreacionDepartamento=$fechaCreacion;
        $this->volumenNegocio=$volumenNegocio;
        $fechaBaja = new DateTime();
        $fechaBaja->setTimestamp($fechaBajaDepartamento);
        $this->fechaBajaDepartamento=$fechaBaja;
    }
}