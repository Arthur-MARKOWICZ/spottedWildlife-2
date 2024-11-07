<?php

    include('conn.php');
    include('protect.php');
    include('protectadmin.php');
    $listardados = $conn->query("SELECT * FROM especialistas");
   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dados.css" />
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
    <table class='table'>
        <thead> 
            <tr>
                <th scope="col">especialista_id</th>
                <th scope="col">usuarios_id</th>
                <th scope="col">formacao</th>
                <th scope="col">número de postagens verificadas</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($usuario_dados = mysqli_fetch_assoc($listardados)){
                    echo "<tr>";
                    echo "<td>".$usuario_dados['especialista_id']."</td>";
                    echo "<td>".$usuario_dados['usuarios_id']."</td>";
                    echo "<td>".$usuario_dados['formacao']."</td>";
                    echo "<td>".$usuario_dados['num_post_verificada']."</td>";
                    echo "<td><a class='botao' href='deletarEspecialistas.php?idU=$usuario_dados[usuarios_id]'>Tirar especialista</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>