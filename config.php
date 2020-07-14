<?php 

session_start();
/* Configuracion de la Base de Datos */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'proyecto_db');
define("BASE_URL", "http://localhost/CARPETA_RAIZ_DE_TU_PROYECTO/"); // Recuerda cambiar la carpeta raiz de tu proyecto y/o 
//si quieras empezarlo a usar con  tu dominio en vez de  Eg.: "http://localhost/CARPETA_RAIZ_DE_TU_PROYECTO/" Será --> 
//http://yourwebsite.com


function getDB() 
{
    $dbhost=DB_SERVER;
    $dbuser=DB_USERNAME;
    $dbpass=DB_PASSWORD;
    $dbname=DB_DATABASE;

    try {
        $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 

        $dbConnection->exec("set names utf8");

        //Este comando interno es para ejecutar comandos en el motor de la db y asi usar el UTF8-->  
        //$dbConnection->exec("set names utf8");

        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "yepaa";
        return $dbConnection;
    }
    catch (PDOException $e) {
        echo 'Fallo la Conexion a la DB: ' . $e->getMessage();
    }

}

?>