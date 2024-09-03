<?php
    $user = "root";
    $password = "root";
    $database = "crud_system";
    $servername = "localhost";
    
    $conn = new mysqli($servername, $user, $password, $database);
    
    if ($conn->connect_error) {
        die("Conexão falhou: ". $conn->connect_error);
    }
    
?>