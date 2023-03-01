<?php
if(isset($_REQUEST['boton'])){
    switch($_REQUEST['boton']){
        case 'Login':
            cambiarPagina('login');
            break;
        case "RSS":
            cambiarPagina('rss');
            break;
    }
}
require_once "$aVista[layout]";
?>