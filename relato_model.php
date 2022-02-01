<?php 

    include_once("connection.php");
    include_once("website.html");

    //Coletar informações dos inputs
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $telefone = mysqli_real_escape_string($conn, $_POST["telefone"]);
    $mensagem = mysqli_real_escape_string($conn, $_POST["mensagem"]);

    //Montar instrução do banco
    $query = "INSERT INTO relatos (nome, email, telefone, mensagem) VALUES ('$nome', '$email', '$telefone', '$mensagem')";

    //Verificar se a instrução do banco funcionou
    if(!mysqli_query($conn, $query)) {
        die("Falha ao enviar o relato!");
    }
    else {
        //echo "Relato enviado com sucesso!";
        echo "<script language='javascript' type='text/javascript'> alert('Relato enviado com sucesso!') </script>;";
        die();
    }

    //Fechar conexão
    mysqli_close($conn);

?>