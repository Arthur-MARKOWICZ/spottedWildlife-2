<?php
include('conn.php');
include('protectadmin.php');
$listardados = $conn->query("SELECT * FROM em_analise ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="verESC.css" />
    <link rel="stylesheet" href="navbar2.css"/>
    <title>Document</title>
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
                <th scope="col">analise_id</th>
                <th scope="col">usuario_id</th>
                <th scope="col">graduacao</th>
                <th scope="col">diploma</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($usuario_dados = mysqli_fetch_assoc($listardados)){
                    $id = $usuario_dados['analise_id'];
                    echo "<tr>";
                    echo "<td>".$usuario_dados['analise_id']."</td>";
                    echo "<td>".$usuario_dados['usuario_id']."</td>";
                    echo "<td>".$usuario_dados['graduacao']."</td>";
                    echo "<td>"."<img src='diploma.php?id=$id' alt='Imagem da postagem' width='50%' height='50%'>"."</td>";
                    echo "<td>
                    <form action='aceitarESp.php' method='post'>
                        <button  class = 'botao'type='submit' name='usuario_id' value='".$usuario_dados['usuario_id']."'>aceitar</button>
                    </form>
                  </td>";
                  echo "<td>
                  <form action='recusarESp.php' method='post'>
                      <button  class = 'botao'type='submit' name='analise_id' value='".$usuario_dados['analise_id']."'>recusar</button>
                  </form>
                </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>