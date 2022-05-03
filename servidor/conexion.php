<?php
    //Datos para conexión.
    $dbname = "denunciaciudadana";
    $user = "root";
    $password = "1234";
    $host = "LocalHost";

    //Objetos PDO.
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8mb4'",
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ);
    try{ //Try-Catch de conexión. 
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password,$options);
        echo "Conexión a base de datos exitosa";
    }catch(PDOException $e){  
        echo $e->getMessage();
        echo "sin conexión <br><br>";
    }
?>