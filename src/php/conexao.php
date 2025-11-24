<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'catalogo';

    $conn = mysqli_connect($host, $user, $password, $dbname);

    if (!$conn) {
        die('Erro na conexão: ' . mysqli_connect_error());
    }

?>
