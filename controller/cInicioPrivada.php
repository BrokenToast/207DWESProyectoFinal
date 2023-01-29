<?php
if(isset($_REQUEST['salir'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'iniciopublico';
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['detalles'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'detalles';
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['mantenimiento'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'wip';
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['editar'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'micuenta';
    header('Location: ./index.php');
    exit;
}
$aRespuestaInicioPrivado=[];
if(isset($_COOKIE['idioma'])){
    switch ($_COOKIE['idioma']) {
        case 'es':
            $aRespuestaInicioPrivado['idioma']="Bienvenido ".$_SESSION['usuariologinlogoff207']->codUsuario;
            break;
        case 'pt':
            $aRespuestaInicioPrivado['idioma']="Bem-vindo".$_SESSION['usuariologinlogoff207']->codUsuario;
            break;
        case 'ct':
            $aRespuestaInicioPrivado['idioma']="Benvingut".$_SESSION['usuariologinlogoff207']->codUsuario;
            break;
        case 'gl':
            $aRespuestaInicioPrivado['idioma']="Benvido".$_SESSION['usuariologinlogoff207']->codUsuario;
            break;
    }
}else{
    $aRespuestaInicioPrivado['idioma']="Bienvenido ".$_SESSION['usuariologinlogoff207']->codUsuario;
}
if($_SESSION['usuariologinlogoff207']->numAccesos==1){
    $aRespuestaInicioPrivado['mensajeNumConexiones']='Es tu primera conexion';
}else{
    $aRespuestaInicioPrivado['mensajeNumConexiones']=sprintf('Se a conectado %d <br> La ultima conexion fue en %s',$_SESSION['usuariologinlogoff207']->numAccesos,$_SESSION['usuariologinlogoff207']->getfechaHoraUltimaConexionAnterior()->format('d-m-Y H:i:s'));
}
if(isset($_REQUEST['error'])){
    $conexion = new DBPDO(DSNMYSQL, USER, PASSWORD);
    $conexion->executeUDI("INSERT INTO T01_Usuario values(?,?,?,?,?,?,?)");
}
$aRespuestaInicioPrivado['descripcionUsuario']=$_SESSION['usuariologinlogoff207']->descUsuario;
require_once $aVista['layout'];