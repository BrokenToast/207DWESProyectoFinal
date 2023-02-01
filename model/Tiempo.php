<?php
class Tiempo{
    public readonly int $hora;
    public readonly string $ubicacion;
    public readonly int $presion;
    public readonly int $porcentajePrecipitaciones;
    public readonly int $velocidadViento;
    public readonly int $velocidadVientoMaxima;
    public readonly int $temperaturaMinima;
    public readonly int $temperaturaMaxima;
    
    public function __construct(int $hora,string $ubicacion,int $presion,int $porcentajePrecipitaciones,int $velocidadViento,int $velocidadVientoMaxima,int $temperaturaMinima,int $temperaturaMaxima){
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