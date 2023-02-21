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
    $_SESSION['paginaEnCurso'] = 'mtodepartamento';
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['editar'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'micuenta';
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['rest'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'rest';
    header('Location: ./index.php');
    exit;
}
$aRespuestaInicioPrivado=[];
if(isset($_COOKIE['idioma'])){
    switch ($_COOKIE['idioma']) {
        case 'es':
            $aRespuestaInicioPrivado['idioma']="Bienvenido ".$_SESSION['usuarioproyectofinal207']->codUsuario;
            break;
        case 'pt':
            $aRespuestaInicioPrivado['idioma']="Bem-vindo".$_SESSION['usuarioproyectofinal207']->codUsuario;
            break;
        case 'ct':
            $aRespuestaInicioPrivado['idioma']="Benvingut".$_SESSION['usuarioproyectofinal207']->codUsuario;
            break;
        case 'gl':
            $aRespuestaInicioPrivado['idioma']="Benvido".$_SESSION['usuarioproyectofinal207']->codUsuario;
            break;
    }
}else{
    $aRespuestaInicioPrivado['idioma']="Bienvenido ".$_SESSION['usuarioproyectofinal207']->codUsuario;
}
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
$aRespuestaInicioPrivado['descripcionUsuario']=$_SESSION['usuarioproyectofinal207']->descUsuario;
require_once $aVista['layout'];