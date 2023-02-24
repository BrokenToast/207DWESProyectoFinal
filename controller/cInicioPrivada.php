<?php
switch ($_REQUEST['boton']?? null) {
    case 'salir':
        cambiarPagina('iniciopublico');
        break;
    case 'detalles':
        cambiarPagina('detalles');
        break;
    case 'mantenimiento':
        cambiarPagina('mtodepartamento');
        break;
    case 'editar':
        cambiarPagina('micuenta');
        break;
    case 'rest':
        cambiarPagina('rest');
        break;
}
$aRespuestaInicioPrivado=[];
$aRespuestaInicioPrivado['idioma']="Bienvenido ".$_SESSION['usuarioproyectofinal207']->codUsuario;
$aRespuestaInicioPrivado['descripcionUsuario']=$_SESSION['usuarioproyectofinal207']->descUsuario;
if($_SESSION['usuarioproyectofinal207']->numAccesos==1){
    $aRespuestaInicioPrivado['mensajeNumConexiones']='Es tu primera conexion';
}else{
    $aRespuestaInicioPrivado['mensajeNumConexiones']=sprintf('Se a conectado %d <br> La ultima conexion fue en %s',$_SESSION['usuarioproyectofinal207']->numAccesos,$_SESSION['usuarioproyectofinal207']->fechaHoraUltimaConexionAnterior->format('d-m-Y H:i:s'));
}
if(isset($_REQUEST['error'])){
    $conexion = new DBPDO(DSNMYSQL, USER, PASSWORD);
    try{
        $conexion->executeUDI("INSERT INTO T01_Usuario values(?,?,?,?,?,?,?)");
    }catch(ErrorApp $error){
        $_SESSION['paginaEnCurso'] = "error";
        header('Location: ./index.php');
        exit();
    }
}
require_once $aVista['layout'];