<?php
if(isset($_REQUEST['volver'])){
    cambiarPagina($_SESSION['paginaAnterior']);
}
require_once $aVista['layout'];