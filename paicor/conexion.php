<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'paicor_db';

    $connection = @mysqli_connect($host, $user, $password, $db);

    if (!$connection){
        echo 'Error en la conexion';
    }

?>