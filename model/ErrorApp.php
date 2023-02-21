<?php
/**
 * Summary of ErrorApp
 * 
 * Clase que representan los errores de la APP
 * @author luispatb luispatb@gmail.com
 * @version 1.0.0
 * @package model
 */
class ErrorApp extends Exception{
    /**
     * paginaSiguiente
     * 
     * Propiedad donde almacenamos la pagina que a generado el error
     * 
     * @var string
     */
    public readonly string $paginaSiguiente;
    public function __construct(int $code, string $mensaje, string $file, int $lineError, string $paginaSiguiente){
        $this->code=$code;
        $this->message=$mensaje;
        $this->line = $lineError;
        $this->file = $file;
        $this->paginaSiguiente=$paginaSiguiente;
        $_SESSION['error'] = $this;
    }
}