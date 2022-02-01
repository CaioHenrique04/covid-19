<?php 

    $server = "127.0.0.1:3306";
    $user = "root";
    $password = "";
    $dbname = "dbcovid";

    $conn = mysqli_connect($server, $user, $password, $dbname);

    if(!$conn) {
        die("Falha na conexão com o banco de dados!");
    } else {
        //echo "Conexão realizada com sucesso!";
    }

?>