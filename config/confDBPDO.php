<?php
    /**
    * 
    * @author: Luis Pérez Astorga
    * @version: 1.9
    * Fecha Modification: 8/11/2022
    */
    /* Desarollo maquina local*/
    const USER="userDAW207DBLoginLogoff";
    const PASSWORD="paso";
    const HOST="192.168.3.202";
    const DATABASE="DB207DWESLoginLogoff";
    /*Explotacion sauces*/
    //const USER="dbu263643";
    //const PASSWORD="daw2_Sauces";
    //const HOST="db5010845906.hosting-data.io";
    //const DATABASE="dbs9174075";
    /*Desaroolo sauces*/
    //const USER="userDAW207DBLoginLogoff";
    //const PASSWORD="paso";
    //const HOST="192.168.20.19";
    //const DATABASE="DB207DWESLoginLogoff";
    /* General para todos*/
    define("DSNMYSQL",sprintf("mysql:dbname=%s;host=%s",DATABASE,HOST));
?>


