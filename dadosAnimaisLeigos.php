<?php

    include('conn.php');
    include('protect.php');
    $listardados = $conn->query("SELECT * FROM animais ");
   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="animaldados.css" />
    <title>Atualizando dados do cadastro</title>
</head>
<body>
    <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
  <div class= "conteiner">
      
      <nav class= "navbar">
        <a href="index.php">Home</a></br>
        <a href="protectfeed.php">Feed</a></br>
        <a href="postagem.php">Postar</a></br>
        <a href="cadastraanimal.php">Cadastrar animal</a></br>
        <a href="doacao.html">Doação</a></br>
        <a href="dados.php">Dados do cadastro</a></br>
        <a href="protectdadosanimais.php">Dados dos animais</a></br>
        <a href="cadastroespecialista.php">Cadastro dos especialistas</a></br>
        <button><a href="logout.php">Sair</a></button>
      </nav>
    </div>
<div>
    <table class='table'>
        <thead> 
            <tr>
                <th scope="col">nome usual</th>
                <th scope="col">alimentacao</th>
                <th scope="col">risco de extincao</th>
                <th scope="col">migratório</th>
                <th scope="col">nivel de perigo</th>
                <th scope="col">periodo de reprodutivo</th>
                <th scope="col">veneno</th>
                <th scope="col">filo</th>
                <th scope="col">classe</th>
                <th scope="col">ordem</th>
                <th scope="col">ritmo circadiano</th>
            </tr>
            <thead>
    <tbody>
        <?php 
            while($animal_dados = mysqli_fetch_assoc($listardados)){
                echo "<tr>";
                echo "<td>".$animal_dados['nome_usual']."</td>";
                echo "<td>".$animal_dados['alimentacao']."</td>";
                echo "<td>".$animal_dados['risco_extincao']."</td>";
                echo "<td>".$animal_dados['migratório']."</td>";
                echo "<td>".$animal_dados['perigo']."</td>";
                echo "<td>".$animal_dados['periodo_reprodutivo']."</td>";
                echo "<td>".$animal_dados['veneno']."</td>";
                echo "<td>".$animal_dados['filo']."</td>";
                echo "<td>".$animal_dados['classe']."</td>";
                echo "<td>".$animal_dados['ordem']."</td>";
                echo "<td>".$animal_dados['ritmo_circadiano']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</div>
</body>
</html>