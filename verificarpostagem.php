<?php
include('conn.php');
include('protectEspecialista.php');
$id = $_POST['postagem_id'];
$idusuarios = $_SESSION['id'];
$sqlupdate = "UPDATE postagem SET verificada='1'
        WHERE postagem_id ='$id' ";
$sqlverifica = "SELECT verificada from postagem  WHERE postagem_id ='$id'";
$resultV = $conn->query($sqlverifica);
$quantidade = $resultV->fetch_assoc();
if($quantidade['verificada'] != 1){
        $result = $conn->query($sqlupdate);
        $sqlIncrement = "UPDATE especialistas SET num_post_verificada = COALESCE(num_post_verificada) + 1 WHERE usuarios_id = $idusuarios ";
        $resultI = $conn->query($sqlIncrement);
        header('location: feedespecialista.php');
}
else{
        echo "Postagem já verificada";
        echo "<a class='botao' href='feedespecialista.php'>Voltar por feed</a>";
}
?>


