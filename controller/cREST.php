<?php
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('Location: ./index.php');
    exit;
}
$document = new DOMDocument();
$document->load("https://www.aemet.es/xml/municipios/localidad_49021.xml");
$puntero = new DOMXPath($document);
$dias = $puntero->query("//dia");
$tiempo=[];
foreach ($dias as $elemento) {
    $dia=$elemento->attributes->item(0)->nodeValue;
    $maximo = $puntero->query("//root/prediccion/dia[@fecha='$dia']/temperatura/maxima")->item(0)->nodeValue;
    $minimo = $puntero->query("//root/prediccion/dia[@fecha='$dia']/temperatura/minima")->item(0)->nodeValue;
    $tiempo += [$dia => [$maximo, $minimo]];
}
require_once $aVista['layout'];