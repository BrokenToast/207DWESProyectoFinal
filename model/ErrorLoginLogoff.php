<?php
class ErrorLoginLogoff extends Exception{
    public function __construct(int $code,string $mensaje){
        $this->code=$code;
        $this->message=$mensaje;
        $this->llamarVError();
    }
    public function llamarVError(){
        $_SESSION['error'] = $this;
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = "error";
        header('Location: ./index.php');
    }
}