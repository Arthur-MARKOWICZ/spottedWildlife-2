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
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="doacao_agradecimento.css" />
    <title>Verificar postagem</title>
  </head>
  <body>
    <div class="container">
        <h1>Postagem ja foi verificada<h1><br>
      <button onclick="location.href='index.php'">
        Voltar para a Página Inicial
      </button>
    </div>
  </body>
</html>
