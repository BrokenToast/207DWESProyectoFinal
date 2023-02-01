<?php
class Tiempo{
    public readonly mixed $hora;
    public readonly mixed $ubicacion;
    public readonly mixed $presion;
    public readonly mixed $porcentajePrecipitaciones;
    public readonly mixed $velocidadViento;
    public readonly mixed $velocidadVientoMaxima;
    public readonly mixed $temperaturaMinima;
    public readonly mixed $temperaturaMaxima;
    
    public function __construct($hora,$ubicacion,$presion,$porcentajePrecipitaciones,$velocidadViento,$velocidadVientoMaxima,$temperaturaMinima,$temperaturaMaxima){
        $this->hora = $hora;
        $this->ubicacion=$ubicacion;
        $this->presion=$presion;
        $this->porcentajePrecipitaciones=$porcentajePrecipitaciones;
        $this->velocidadViento=$velocidadViento;
        $this->velocidadVientoMaxima=$velocidadVientoMaxima;
        $this->temperaturaMaxima=$temperaturaMaxima;
        $this->temperaturaMinima=$temperaturaMinima;
    }
}