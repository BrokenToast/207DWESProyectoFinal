<?php
require_once '../config/confDBPDO.php';
require_once '../model/DBPDO.php';
require_once('./model/ErrorApp.php');

$conexion= new DBPDO( DSNMYSQL,USER,PASSWORD);

$sqlBrorrado= <<< SQL
    drop table T01_Usuario;
    drop table T02_Departamento;
SQL;
$conexion->executeUDI($sqlBrorrado);