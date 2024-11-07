<?php
include('conn.php');
include('protectEspecialista.php');
$id = $_POST['postagem_id'];
$idusuarios = $_SESSION['id'];
$sqlupdate = "UPDATE postagem SET verificada='1'
        WHERE postagem_id ='$id' ";
$sqlverifica = "SELECT * from postagem  WHERE postagem_id ='$id'";
$resultV = $conn->query($sqlverifica);
$quantidade = $resultV->fetch_assoc();
$nomeAnimal = $quantidade['nome_animal'];
if($quantidade['verificada'] != 1){

        $sql = "SELECT * FROM animais WHERE  nome_usual LIKE '%$nomeAnimal'";
        $result = $conn->query($sql);
        $quantidade = $result->num_rows;
        if($quantidade > 0 ){
            $sqlIncrementA = "UPDATE animais SET num_avistado  = num_avistado + 1 
            WHERE nome_usual LIKE '%$nomeAnimal' ";
            $resultIA = $conn->query($sqlIncrementA);
        }
        $result = $conn->query($sqlupdate);
        $sqlIncrement = "UPDATE especialistas SET num_post_verificada = num_post_verificada + 1 WHERE usuarios_id = $idusuarios ";
        $resultI = $conn->query($sqlIncrement);
        header('location: feedespecialista.php');
}
else{
        echo "Postagem já verificada <br>";
        echo "<a class='botao' href='feedespecialista.php'>Voltar por feed</a>";
}
?>


