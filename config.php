<?php

    function connectToMySQL(
        $host = "localhost", 
        $username = "root", 
        $password = "", 
        $database = "usuarios") 
        {
        $connection = new mysqli($host, $username, $password, $database);

        if ($connection->connect_error) {
            throw new Exception("Error al conectar a la base de datos: " . $connection->connect_error);
        }

        echo "<h2>Conexión exitosa!</h2>";
        return $connection;
    };

?>