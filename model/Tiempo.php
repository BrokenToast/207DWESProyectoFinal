<?php
/**
 * Tiempo
 * 
 * Clase que representa el tiempo
 * 
 *  @author Luispatb luispatb@gmail.com
 *  @version 1.0.0
 *  @package model
 */
class Tiempo{
    /**
     * Summary of hora
     * 
     * Hora de la información climatica
     * 
     * @var DateTime|null
     */
    public readonly DateTime $hora;
    /**
     * Summary of ubicacion
     * 
     * Ubicacion de la estación
     * 
     * @var string|null
     */
    public readonly ?string $ubicacion;
    /**
     * Summary of presion
     * 
     * Presion
     * 
     * @var int|null
     */
    public readonly ?int $presion;
    /**
     * Summary of porcentajePrecipitaciones
     * 
     * Porcentaje de Precipitaciones
     * 
     * @var int|null
     */
    public readonly ?int $porcentajePrecipitaciones;
    /**
     * Summary of velocidadViento
     * 
     * Velocidad del viento
     * 
     * @var int|null
     */
    public readonly ?int $velocidadViento;
    /**
     * Summary of velocidadVientoMaxima
     * 
     * Velocidad Maxima del viento
     * 
     * @var int|null
     */
    public readonly ?int $velocidadVientoMaxima;
    /**
     * Summary of temperaturaMinima
     * 
     * Temperatura Minima
     * 
     * @var int|null
     */
    public readonly ?int $temperaturaMinima;
    /**
     * Summary of temperaturaMaxima
     * 
     * Temperatura Maxima
     * 
     * @var int|null
     */
    public readonly ?int $temperaturaMaxima;
         /**
          * Summary of __construct
          * @param DateTime|null $hora Hora de la información climatica
          * @param string|null $ubicacion Ubicacion de la estación
          * @param int|null $presion Presion
          * @param int|null $porcentajePrecipitaciones Porcentaje de Precipitaciones
          * @param int|null $velocidadViento Velocidad del viento
          * @param int|null $velocidadVientoMaxima Velocidad Maxima del viento
          * @param int|null $temperaturaMinima Temperatura Minima
          * @param int|null $temperaturaMaxima Temperatura Maxima
          */
    public function __construct(DateTime $hora=null,string $ubicacion=null,int $presion=null,int $porcentajePrecipitaciones=null,int $velocidadViento=null,int $velocidadVientoMaxima=null,int $temperaturaMinima=null,int $temperaturaMaxima=null){
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