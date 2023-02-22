# 207DWESProyectoFinal
Proyecto final de desarrollo web en el entorno servidor :D
# Instalación:

1\. Tenemos que tener instalado previamente el siguiente software:

- Apache HTTP.
- PHP.
- Mysql o Mariadb.

2\. Descargamos los ficheros.

3\. Los metemos dentro de la carpeta del sitio virtual

4\. Ejecutamos los scrips SQL que estan dentro de scriptDB en la base de datos

5\. Ahora configuramos la conexión a la base de datos:

Editamos configDBPDO.php de la siguiente forma:

```php
const USER="userDAW207DBLoginLogoff";//Usuario de la base de datos
const PASSWORD="paso";//Contraseña del usuario
const HOST="192.168.3.202";// Ip de la base de datos
const DATABASE="DB207DWESLoginLogoff";// Nombre de la base de datos
```

6\. Entrar con el navegador al sitio web.