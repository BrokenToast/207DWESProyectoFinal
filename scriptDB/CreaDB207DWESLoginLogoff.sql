CREATE DATABASE if not exists DB207DWESLoginLogoff;
create user if not exists 'userDAW207DBLoginLogoff'@'%' IDENTIFIED BY 'paso';
use DB207DWESLoginLogoff;
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
grant all privileges on DB207DWESLoginLogoff.* to 'userDAW207DBLoginLogoff'@'%';
