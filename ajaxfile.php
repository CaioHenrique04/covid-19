<?php
include_once("connection.php");

 
$userid = $_POST['userid'];
 
$sql = "select * from relatos where id=".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<table border='0' width='100%'>
<tr>
    <td>
    <p><strong>Código:</strong> <?php echo $row['id']; ?></p>
    <p><strong>Nome:</strong> <?php echo $row['nome']; ?></p>
    <p><strong>E-mail:</strong> <?php echo $row['email']; ?></p>
    <p><strong>Telefone:</strong> <?php echo $row['telefone']; ?></p>
    <p><strong>Relatório:</strong> <?php echo $row['mensagem']; ?></p>
</tr>
<tr>
    <td>
        <a target="_blank" href="https://wa.me/<?php echo $row['telefone']; ?>"><button class="btn btn-success">WhatsApp</button></a>
    </td>
</tr>
</table>
 
<?php } ?>