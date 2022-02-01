<?php 

    include_once("connection.php");
    include_once("login.html");

    $crm = mysqli_real_escape_string($conn, $_POST["crm"]);
    $entrar = $_POST["login-button"];
    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);

    if (isset($entrar)) {

        $query = "SELECT * FROM medicos WHERE crm = '$crm' AND senha = '$senha'";

        $verifica = mysqli_query($conn, $query) or die("Erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='login.html';</script>";
            die();
        }else{
            setcookie("crm", $crm);
            header("Location: sistema.php");
            //echo "Logado com sucesso!";
      }
  }

  mysqli_close($conn);

?>