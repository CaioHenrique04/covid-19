<?php 
    include_once("connection.php");

    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $endereco = mysqli_real_escape_string($conn, $_POST["endereco"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $crm = mysqli_real_escape_string($conn, $_POST["crm"]);
    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);

    $queryCad = "INSERT INTO medicos (nome, endereco, email, crm, senha) VALUES ('$nome', '$endereco', '$email', '$crm', '$senha')";

    if(!mysqli_query($conn, $queryCad)) 
    {
        die("Falha na inserção dos dados = $queryCad -> ".mysqli_errno($conn)." -> ".mysqli_error($conn));
    }
    else 
    {
        //header("Location: login.html");
        //echo "Médico cadastrado com sucesso!";
    }

    $idMedico = mysqli_insert_id($conn);

    $queryLogin = "INSERT INTO login (crm, senha, idMedico) VALUES ('$crm', '$senha', '$idMedico')";

    if(!mysqli_query($conn, $queryLogin)) 
    {
        die("Falha na inserção dos dados = $queryLogin -> ".mysqli_errno($conn)." -> ".mysqli_error($conn));
    }
    else 
    {
        header("Location: login.html");
    }
    
    mysqli_close($conn);

?>