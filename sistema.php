<?php

include_once("connection.php");

$result_relatos = "SELECT * FROM relatos";

$resultado_relatos = mysqli_query($conn, $result_relatos);

if (!$resultado_relatos) {
    die("Falha na busca dos dados!");
} else {
    //echo "Dados buscados com sucesso!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="sistema.css">
    <title>Área Médica</title>
</head>

<body>
    <main>
        <div class="main-left">
            <h2>INFO PÓS COVID</h2>
            <p>Relatos</p>
            <a href="">Em Aberto</a>
            <a href="">Finalizado</a>
            <p>Informações</p>
            <a style="margin-bottom: 0px !important;" href="">Minhas informações</a>
        </div>
        <div class="main-right">
            <div>
                <div class="main-right-welcome">
                    <h2 style="margin-right: 20px;">Bem-vindo!</h2>
                    <img style="width: 50px;" src="images/doctor.svg" alt="">
                </div>

                <a href="website.html">Sair</a>
            </div>
            <p>Relatos dos pacientes</p>

            <table class="table table-hover">
                <tbody>
                    <?php while ($rows_relatos = mysqli_fetch_assoc($resultado_relatos)) { ?>
                        <tr>
                            <td>
                                <?php echo $rows_relatos['nome']; ?></td>
                            <td>
                                <button data-id='<?php echo $rows_relatos['id']; ?>' class="userinfo btn btn-success">Visualizar</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal fade" id="exampleModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Informações do paciente</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('.userinfo').click(function() {
                var userid = $(this).data('id');
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'post',
                    data: {
                        userid: userid
                    },
                    success: function(response) {
                        $('.modal-body').html(response);
                        $('#exampleModal').modal('show');
                    }
                });
            });
        });
    </script>

</body>

</html>