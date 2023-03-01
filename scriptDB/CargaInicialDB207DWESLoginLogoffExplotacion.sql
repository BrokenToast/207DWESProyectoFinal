use dbs9174075;
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
insert into  T01_Departamento values
     ('DPB',"Departamento de Bases de datos",unix_timestamp(),605.65,null),
     ('DPI',"Departamento de informatica",unix_timestamp(),500.65,null),
     ('DLE',"Departamento de lenguan española",unix_timestamp(),200.65,null);