<?php

    include('conn.php');
    include('protect.php');
    $id = $_SESSION['id'];
    $listardados = $conn->query("SELECT * FROM usuarios WHERE usuarios_id = $id");
   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dados.css" />
    <link rel="stylesheet" href="navbar2.css"/>
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
  <?php include 'logo.php'; ?>
    <div class= "conteiner">
      
    <nav class= "navbar">
      <?php include 'navbar.php'; ?>
      </nav>
    </div>
<div>
    <table class='table'>
        <thead> 
            <tr>
                <th scope="col">cpf</th>
                <th scope="col">nome</th>
                <th scope="col">sexo</th>
                <th scope="col">animal favorito</th>
                <th scope="col">data de nascimento</th>
                <th scope="col">senha</th>
                <th scope="col">nick</th>
                <th scope="col">pais</th>
                <th scope="col">estado</th>
                <th scope="col">cidade</th>
                <th scope="col">telefone</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($usuario_dados = mysqli_fetch_assoc($listardados)){
                    echo "<tr>";
                    echo "<td>".$usuario_dados['cpf']."</td>";
                    echo "<td>".$usuario_dados['nome']."</td>";
                    echo "<td>".$usuario_dados['sexo']."</td>";
                    echo "<td>".$usuario_dados['animal_fav']."</td>";
                    echo "<td>".$usuario_dados['data_nasc']."</td>";
                    echo "<td>".$_SESSION['senha']."</td>";
                    echo "<td>".$usuario_dados['nome_user']."</td>";
                    echo "<td>".$usuario_dados['end_pais']."</td>";
                    echo "<td>".$usuario_dados['end_estado']."</td>";
                    echo "<td>".$usuario_dados['end_cidade']."</td>";
                    echo "<td>".$usuario_dados['telefone']."</td>";
                    echo "<td>".$usuario_dados['email_pessoal']."</td>";
                    echo "<td><a class='botao' href='editardados.php'>editar</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>