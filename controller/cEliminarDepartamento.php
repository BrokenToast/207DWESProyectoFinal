<?php
function volver(){
    cambiarPagina("mtodepartamento");
}
if(isset($_REQUEST['volver']) || isset($_REQUEST['no']) ){
    volver();
}
if (isset($_REQUEST['si']) ) {
    DepartamentoPDO::bajaFisicaDepartamento();
    volver();
}
require_once $aVista['layout'];