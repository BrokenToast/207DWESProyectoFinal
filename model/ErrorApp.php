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
    public function __construct(int $code, string $mensaje, string $file, int $lineError){
        $this->code=$code;
        $this->message=$mensaje;
        $this->line = $lineError;
        $this->file = $file;
    }
    public function llamarVError(){
        $_SESSION['error'] = $this;
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = "error";
        header('Location: ./index.php');
    }
}