<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejecutar Script</title>
</head>
<body>
    <header>
        <h1>Ejecutar Script</h1>
    </header>
    <section>
        <article>
        <?php
        require_once '../config/confDBPDO.php';
        if(isset($_REQUEST['ejecutar'])){
            // Cambiar estos parametros
            $comando=$_REQUEST['gdb']." -h ".HOST." -u ".USER." --password=".PASSWORD. "<" .$_REQUEST['script'];
            exec($comando,$respuesta);
            foreach($respuesta as $valor){
                print $valor;
            }
        }
        ?> 
        <form id="tableForm" action="insertar_scripts.php" method="post">
            <table >
                <tr>
                    <td colspan="2"><h3>Ejecución de un script</h3></td>
                </tr>
                <tr>
                    <td><p>Gestor de bases de datos:</p></td>
                    <td>
                        <select name="gdb">
                            <option value="mysql">Mysql</option>
                            <option value="mariadb">Mariadb</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><p>Scripts:</p></td>
                    <td>
                        <select name="script">
                            <option value="./BorraDB207DWESLoginLogoff.sql">BorraDB207DWESproyecto</option>
                            <option value="./CargaInicialDB207DWESLoginLogoff.sql">CargaInicialDB207DWESproyecto</option>
                            <option value="./CreaDB207DWESLoginLogoff.sql">CreaDB207DWESproyecto</option>

                            <option value="./BorraDB207DWESLoginLogoffExplotacion.sql">BorraDB207DWESproyectoExplotacion</option>
                            <option value="./CargaInicialDB207DWESLoginLogoffExplotacion.sql">CargaInicialDB207DWESproyectoExplotacion</option>
                            <option value="./CreaDB207DWESLoginLogoffExplotacion.sql">CreaDB207DWESproyectoExplotacion</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><p></p></td>
                </tr>
                <tr>
                    <td colspan="2" id="botones">
                        <button name="ejecutar" type="submit" value="ejecutar">Ejecutar</button>
                    </td>

                </tr>
            </table>
        </form> 
        </article>
    </section>
    <footer>
            <p>Creado por Luis Pérez Astorga | Licencia GPL</p>
            <a href="../../../index.html"><img src="../../../doc/logo_Casa.png" alt="Pagina creador" width="50" height="50"></a>
            <a href="../index.php"><img src="../../../doc/atras.svg" alt="Atras" width="50" height="50"/></a>
    </footer>
</body>
</html>




