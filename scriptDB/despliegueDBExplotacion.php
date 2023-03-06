<?php
require_once '../config/confDBPDO.php';
require_once '../model/DBPDO.php';
require_once('../model/ErrorApp.php');

$conexion= new PDO( DSNMYSQL,USER,PASSWORD);

$sqlCreacion= <<< SQL
    create table if not exists T01_Usuario(
        T01_CodUsuario VARCHAR(20) PRIMARY KEY,
        T01_Password VARCHAR(256) not null,
        T01_DescUsuario VARCHAR(255) not null,
        T01_FechaHoraUltimaConexion int not null,
        T01_NumConexiones int not null,
        T01_Perfil ENUM('usuario','administrador') default 'usuario' not null,
        T01_ImagenUsuario MEDIUMBLOB
    )engine=innodb;
    create table if not exists T02_Departamento(
        T02_CodDepartamento character(3) PRIMARY KEY,
        T02_DescDepartamento character(255)not null,
        T02_FechaDeCreacionDepartamento int not null,
        T02_VolumenDeNegocio float not null,
        T02_FechaBajaDepartamento int
    )engine=innodb;
SQL;
$sqlCargaInicial= <<< SQL
    INSERT INTO T01_Usuario VALUES
        ('admin',SHA2('paso',256),'administrador',UNIX_TIMESTAMP(),0,'administrador',null),
        ('luis',SHA2('paso',256),'administrador',UNIX_TIMESTAMP(),0,'administrador',null),
        ('david',SHA2('paso',256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
        ('manuel',SHA2('paso',256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
        ('ricardo',SHA2('paso',256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
        ('josue',SHA2('paso',256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
        ('alejandro',SHA2('paso',256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
        ('heraclio',SHA2('paso',256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
        ('amor',SHA2('paso',256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
        ('antonio',SHA2('paso',256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
        ('alberto',SHA2('paso',256),'Usuario estandar',unix_timestamp(),0,'usuario',null);
    insert into  T02_Departamento values
        ('DPB',"Departamento de Bases de datos",unix_timestamp(),605.65,null),
        ('DPI',"Departamento de informatica",unix_timestamp(),500.65,null),
        ('DLE',"Departamento de lenguan española",unix_timestamp(),200.65,null);
SQL;
try {
    $conexion->exec($sqlCreacion);
    $conexion->exec($sqlCargaInicial);
} catch (Error $th) {
    var_dump($th->getMessage());
}
