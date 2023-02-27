<?php
$departamento=DepartamentoPDO::buscarDepartamentoPorCod($_SESSION ['codDepartamentoEnCurso'])[0];
$aRespuestaVista=[
    "codigo"=>$departamento->codDepartamento,
    "descripcion"=>$departamento->descDepartamento,
    "volumenNegocio"=>$departamento->volumenNegocio,
    "fechaCreacion"=>$departamento->fechaCreacionDepartamento->format('d-m-Y H:i:s'),
    "fechaBaja"=>date('d-m-Y H:i:s',$departamento->fechaBajaDepartamento),
];
if(isset($_REQUEST['cancelar'])){
    cambiarPagina("mtodepartamento");
}
if (isset($_REQUEST['eliminar']) ) {
    DepartamentoPDO::bajaFisicaDepartamento();
    cambiarPagina("mtodepartamento");
}
require_once $aVista['layout'];