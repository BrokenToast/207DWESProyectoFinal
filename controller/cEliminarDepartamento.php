<?php
function volver(){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] =  "mtodepartamento";
    header('Location: ./index.php');
    exit;
}
if(isset($_REQUEST['volver']) || isset($_REQUEST['no']) ){
    volver();
}
if (isset($_REQUEST['si']) ) {
    DepartamentoPDO::bajaFisicaDepartamento();
    volver();
}
require_once $aVista['layout'];