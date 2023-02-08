<?php

/**
 * Class validacionFormularios
 *
 * Fichero con la clase validacionFormulario, que contiene funciones para validar los campos de los formularios
 *
 * PHP version 7.0
 */

/**
 * 
 * Clase de validacion de formularios
 * 
 * Clase de validacion de formularios que contiene las funciones necesarias para validar los campos de un formulario.
 * 
 * @author Version 1.6 Javier Nieto y Cristina Nuñez
 * @author Versión 1.3 Adrián Cando Oviedo
 * @category Validacion
 * @package  Validacion
 * @source ClaseValidacion.php
 * @since 1.6 30/11/2020 Mejoras en las funciones comprobarEnter(), comprobarFloat(), validarPassword()
 * @since 1.5 mejorada la ortografía de los mensajes de error
 * se escribian cada vez que querías mostrarlos ahora ya los devuelve cada función a la que se ha llamado sin tener que escribir nada.
 * @since 1.4 Mejorado los métodos comprobarEntero() y comprobarFlaoat()
 * comprobarAlfanumerico y validarEmail. También he eliminado una función inservible "comprobarCódigo". Este cambio se basa en simplificar la cantidad de código ya que antes los * errores
 * @since 1.3 Se han modificado la devolución de varias funciones: comprobarNoVacío, comprobarMintamanio, comprobarMaxTamanio, comprobarEntero, comprobarFloat, antes estas 3 devolvían un valor boolean, ahora
 * devuelven una cadena con el mensaje de error. Estas 3 anteriores funciones se emplean en otras 3 funciones que he cambiado, algo más compuestas las cuales son: comprobarAlfabético, 
 * @since 1.2 Se han acabado de formatear los mensajes de error, se han modificado validarURL() y se han añadido validarCp(), validarPassword(), validarRadioB() y validarCheckBox()
 * @since 1.1 Se han formateado los mensajes de error y modificado validarDni()
 * @copyright 2018-2020 DAW2
 * @version 1.6
 * 
 * 
 */
class validacionFormularios {  //ELIMINA EL METODO VALIDATEDATE Y LO INCLUYE EN VALIDAR FECHA, ELIMINACION DE VALIDAR CHECKBOX Y RADIOB, MEJORA GENERAL DE RESPUESTA, INCLUSION DE PARAMETROS PREDEFINIDOS Y MEJORAS SUSTANCIALES EN ALGUNOS METODOS

    /**
     * 
     * Funcion comprobarAlfabetico
     * 
     * Funcion que compueba si el parametro recibido esta compuesto por caracteres alfabeticos
     * 
     * @author Adrián Cando Oviedo
     * @version 1.0 He eliminado todos los if innecesrios que había simplificandolo a llamar a las funciones internas de errores que devuelven un error si le hay
     * concatenando esos errores en una cadena. Y comprobando que está vacío siempre que sea obligatorio. He añadido algunos comentarios explicando los nuevos cambios.
     * @since 2018-10-23
     * @param string $cadena Cadena que se va a comprobar.
     * @param int $maxTamanio Tamaño máximo de la cádena.
     * @param int $minTamanio Tamaño mínimo de la cadena.
     * @param boolean $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function comprobarAlfabetico(string $cadena, $maxTamanio = 1000, $minTamanio = 1, $obligatorio = 0) {  //AÑADIDOS VALORES POR DEFECTO Y MEJORADA LA RESPUESTA
        // Patrón para campos de solo texto
        $patron_texto = sprintf("/^[a-záéíóúäëïöüàèìòùñ\s]{%d,%d}$/i",$minTamanio,$maxTamanio);

        //Si es olbigatorio se comprueba si está vacío, si no es obligatorio, no es necesario
        if ((empty($cadena) || is_null($cadena)) && $obligatorio) {
            return "Campo vacio";
        }
        
        //Comprobación de que la cadena introducida coincide con la sintaxis permitida del patrón
        if (!preg_match($patron_texto, $cadena)) {
            return " Sololetras. Cantidad de caracteres $maxTamanio-$minTamanio";
        }
        return null;
    }

    /**
     * Funcion comprobarAlfaNumerico
     * 
     * Funcion que compueba si el parametro recibido esta compuesto por caracteres alfabeticos y numericos conjuntamente.
     *         
     * @author Adrián Cando Oviedo
     * @version 1.0 He eliminado todos los if innecesrios que había simplificandolo a llamar a las funciones internas de errores que devuelven un error si le hay
     * concatenando esos errores en una cadena. Y comprobando que está vacío siempre que sea obligatorio. He añadido algunos comentarios explicando los nuevos cambios.
     * @since 2018-10-23
     * @param string $cadena Cadena que se va a comprobar.
     * @param int $maxTamanio Tamaño máximo de la cádena.
     * @param int $minTamanio Tamaño mínimo de la cadena.
     * @param bool $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function comprobarAlfaNumerico($cadena, $maxTamanio = 1000, $minTamanio = 1, $obligatorio = 0) {  //AÑADIDOS VALORES POR DEFECTO Y MEJORADA LA RESPUESTA
        // Patrón para campos de solo texto
        $patron_texto = sprintf("/^[a-záéíóúäëïöüàèìòùñ\s0-9]{%d,%d}$/i",$minTamanio,$maxTamanio);

        //Si es olbigatorio se comprueba si está vacío, si no es obligatorio, no es necesario
        if ((empty($cadena) || is_null($cadena)) && $obligatorio) {
            return "Campo vacio";
        }
        
        //Comprobación de que la cadena introducida coincide con la sintaxis permitida del patrón
        if (!preg_match($patron_texto, $cadena)) {
            return " Solo alfanumerico. Cantidad de caracteres $maxTamanio-$minTamanio";
        }
        return "";
       
    }
    /**
     * 
     * Funcion comprobarEntero
     * 
     * Funcion que compueba si el parametro recibido es un numero entero.
     *     
     * @author Javier Nieto y Cristina Núñez
     * @since 30/11/2020
     * @param int $integer Número entero a comprobar
     * @param int $max Valor máximo del entero
     * @param int $min Valor mínimo del entero
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function comprobarEntero($integer, $max = PHP_INT_MAX, $min = -PHP_INT_MAX, $obligatorio = 0){  //AÑADIDOS VALORES POR DEFECTO Y AHORA DETECTA EL 0
        if($obligatorio&&(empty($integer) || is_null($integer) )){
            return "Campo vacio.";
        }else{
            if(!empty($integer)){  
                if (is_float($integer)){
                    return "El campo no es un entero. ";
                }else{
                    if($integer>$max || $integer<$min){
                        return "El valor tiene que estar en $min y $max";
                    }
                }
            }
        }
        return null;
    }
    /**
     * Funcion comprobarFloat
     * 
     * Funcion que compueba si el parametro recibido es un numero decimal.
     *    
     * @author Javier Nieto y Cristina Núñez
     * @since 30/11/2020
     * @param float $float Número entero a comprobar
     * @param int $max Valor máximo del entero
     * @param int $min Valor mínimo del entero
     * @param boolean $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function comprobarFloat($float, $max = PHP_FLOAT_MAX, $min = -PHP_FLOAT_MAX, $obligatorio = 0){  //AÑADIDOS VALORES POR DEFECTO Y AHORA DETECTA 0
        if ($obligatorio == 1 && empty($float)) {
            return "El campo esta vacio";
        }else{
            $float= str_replace('.', ',', $float);
            if (!is_float($float)) {
                return "El campo no es un decimal. (Debe llevar punto(.) entre la parte entera y la parte decimal)";
            }else{
                if($float>$max || $float<$min){
                    return "El numero debe de estar entre $max - $min.";
                }
            }
        }
        return null;
    }
        /**
     * Funcion comprobarNumber
     * 
     * Funcion que compueba si el parametro recibido es un numero decimal.
     *    
     * @author Javier Nieto y Cristina Núñez
     * @since 30/11/2020
     * @param numeric $number Número entero a comprobar
     * @param int $max Valor máximo del entero
     * @param int $min Valor mínimo del entero
     * @param boolean $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function comprobarNumber($number, $max = PHP_FLOAT_MAX, $min = -PHP_FLOAT_MAX, $obligatorio = 0){  //AÑADIDOS VALORES POR DEFECTO Y AHORA DETECTA 0
        if ($obligatorio == 1 && empty($number)) {
            return "El campo esta vacio";
        }else{
            if (!is_numeric($number)) {
                return "El campo no es un decimal. (Debe llevar punto(.) entre la parte entera y la parte decimal)";
            }else{
                if($number>$max || $number<$min){
                    return "El numero debe de estar entre $max - $min.";
                }
            }
        }
        return null;
    }
    /**
     * Funcion validarEmail
     * 
     * Funcion que compueba si el parametro recibido es un email valido.
     *    
     * @author Adrián Cando Oviedo
     * @version 1.3 He modificado el tratamiento de los mensajes de error, y las comprobaciones, adaptadas a la nueva forma de los mensajes. He eliminado los if innecesarios
     * He añadido nuevos comentarios explicando el nuevo funcionamiento.
     * @since 2018-10-23
     * @param string $email Cadena a comprobar.
     * @param boolean $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function validarEmail($email, $obligatorio = 0) { //ELIMINADoS MAX Y MIN, IMPLEMENTACION DE PARAMETRO POR DEFECTO Y MEJORADA  LA RESPUESTA

        //Compruebo si está vacío cuadno es obligatorio
        if ($obligatorio == 1 && empty($email)) {
            return "El Campo esta vacio"; 
        }

        //Comprobación de que la sintaxis del correo introducido es correcta
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) { //HE SIMPLIFICADO ESTO
            return " Formato de correo incorrecto(Ejemplo: tunombre@hotmail.com).";
        }
        return null;
    }
    /**
     * Funcion validarURL
     * 
     * Funcion que compueba si el parametro recibido es una URL valida.
     * 
     * @author Christian Muñiz de la Huerga
     * @param string $url Cadena a comprobar.
     * @param boolean $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarURL($url, $obligatorio = 0) { //MEJORADA LA RESPUESTA Y ASIGNADO VALOR POR DEFECTO
        if ($obligatorio == 1 && empty($url)) {
            return "El Campo esta vacio"; 
        }
        if (!filter_var($url, FILTER_VALIDATE_URL) && !empty($url)){
            return "Formato incorrecto de URL.";
        }        
        return null;
    }

    /**
     * Funcion validarFecha
     * 
     * Funcion que compueba si el parametro recibido es una fecha valida.
     * 
     * @param string $fecha Cadena con formato de fecha a comprobar.
     * @param string $fechaMaxima Fecha maxima que se puede introducir
     * @param string $fechaMinima Fecha minima que se puede introducir
     * @param boolean $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarFecha($fecha, $fechaMaxima = '01/01/2200', $fechaMinima = "01/01/1900", $obligatorio = 0) { //REDISEÑO TOTAL Y AÑADIDOS PARAMETROS INICIALES
        $fechaMaxima = strtotime($fechaMaxima); //PASAR A TIMESTAMP PARA PODER OPERAR
        $fechaMinima = strtotime($fechaMinima);
        $fechaFormateada = strtotime($fecha);  //CREAR FECHA PARA TRABAJAR CON LAS FUNCIONES DE PHP
        if ($obligatorio == 1 && empty($fecha)) {
            return "El Campo esta vacio"; 
        }
        if (is_bool($fechaFormateada) && !empty($fecha)) {
            return " Formato incorrecto de fecha (Año-Mes-dia) (2000-01-01).";
        } else {
            if(!empty($fecha) && ($fechaFormateada < $fechaMinima) || ($fechaFormateada > $fechaMaxima)){
                return " Por favor introduzca una fecha entre " . date('d/m/Y', $fechaMinima) . " y " . date('d/m/Y', $fechaMaxima) . ".";
            }
        }
        return null;
    }

    /**
     * Funcion validarDni
     * 
     * Funcion que compueba si el parametro recibido es un dni valido. 
     * Si no es obligatorio, da por válido un campo vacío o un DNI, si lo es, será necesario introducir un DNI bien formateado
     * 
     * @author Mario Casquero Jañez
     * @param string $dni cadena a comprobar.
     * @param boolean $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarDni($dni, $obligatorio = 0) { //AÑADIDO VALOR POR DEFECTO Y MEJORADA LA SALIDA
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);
        if ($obligatorio == 1 && empty($dni)) {
            return "El Campo esta vacio"; 
        }
        if(!is_numeric($letra) && is_numeric($numeros)){
            if ((substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) != $letra || strlen($letra) != 1 || strlen($numeros) != 8) && !empty($dni)) {
                return " El DNI no es válido.";
            }
        }else{
            if(!empty($dni)){
                return " El DNI no es válido.";
            }
        }
        return null;
    }
    /**
     * Funcion validarFecha
     * 
     * Funcion que compueba si el parametro recibido es una fecha valida.
     * Valida el código postal, si es opcional da por válido que sea correcto o este vacío, si es obligatorio solo da por válido que esté correcto
     * 
     * @author Mario Casquero Jañez
     * @param string $cp cadena a comprobar.
     * @param boolean $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarCp($cp, $obligatorio = 0){  //AÑADIDO PARAMETRO INDEFINIDO Y SALIDA MEJORADA
        if ($obligatorio == 1 && empty($cp)) {
            return "El Campo esta vacio"; 
        }

        if (!preg_match('/^[0-9]{5}$/i', $cp) && !empty($cp)){
            return" El código postal no es válido.";
        }
        return null;
    }
    /**
     * Funcion validarPassword
     * 
     * Funcion que compueba si el parametro recibido es una comntraseña valida.
     * Hay tres tipos de validacion diferentes segun su complejidad: alfabetico, alfanumerico y complejo (contiene al menos 1 letra mayuscula y un numero)
     *  
     * @author Javier Nieto y Cristina Núñez
     * @since 30/11/2020
     * @param string $password cadena a comprobar.
     * @param mixed $patron Patron de que sigue la contraseña
     * @param boolean $obligatorio valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarPassword($password, $patron, $obligatorio = 1) {
        if ($obligatorio == 1 && empty($password)){
            return "El Campo esta vacio"; 
        }
        if(!preg_match($patron,$password)){
            return "No sigue el patron";
        }
        return null;
    }

    /**
     * Funcion validarTelefono
     * 
     * Funcion que compueba que la cadena pasada como parametro tiene el formato correcto de un numero de telefono.
     * 
     * @author Tania Mateos
     * @author Luis Puente Fernández
     * @version 1.4 Corregido la variable en la que se almacena el mensaje de error en caso de estar vacio la cual era distinta a la que se devolvía, tambien se ha cambiado el nombre de la variable mensaje a mensajeError, que es mas descriptivo
     * @version 1.3 Modificada la comprobación de si está vacio. Modificada la devolución de la función, ahora devuelve nada o un mensaje de error.
     * @since 2020-10-19
     * @param string $tel telefono que se va a comprobar. 
     * @param boolean $obligatorio valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es. 
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    
    public static function validarTelefono($tel, $obligatorio = 0){ //AÑADIDO PARAMETRO POR DEFECTO, MEJORADA LA FUNCIONALIDAD Y LA SALIDA
        $patron="/^[6|7|9][0-9]{8}$/";
        if ($obligatorio == 1 && empty($tel)) {
            return "El Campo esta vacio"; 
        }
        if (!preg_match($patron, $tel) && !empty($tel)) {
            return " El telefono debe comenzar por 6,7 o 9 y a continuación 8 dígitos del 0 al 9.";
        }
        return null; 
    }
}

?>