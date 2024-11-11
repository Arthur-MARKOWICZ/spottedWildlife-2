<?php

    include('conn.php');
    include('protect.php');
   
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM animais WHERE animal_id LIKE '%$data%' or nome_usual LIKE '%$data%' ORDER BY animal_id DESC";
    }
    else
    {
        $sql = "SELECT * FROM animais ORDER BY animal_id DESC";
    }
    $listardados = $conn->query($sql);
   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="animaldados.css" />
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
    <div class='titulo'>
        <h1>Animais</h1>
    </div>
<div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button></div>
<div>
<div>
    <table class='table'>
        <thead> 
            <tr>
                <th scope="col">nome usual</th>
                <th scope="col">alimentacao</th>
                <th scope="col">risco de extincao</th>
                <th scope="col">migratorio</th>
                <th scope="col">nivel de perigo</th>
                <th scope="col">periodo de reprodutivo</th>
                <th scope="col">veneno</th>
                <th scope="col">filo</th>
                <th scope="col">classe</th>
                <th scope="col">ordem</th>
                <th scope="col">ritmo circadiano</th>
                <th scope="col">Número de vezes avistados</th>
            </tr>
            <thead>
    <tbody>
        <?php 
            while($animal_dados = mysqli_fetch_assoc($listardados)){
                echo "<tr>";
                echo "<td>".$animal_dados['nome_usual']."</td>";
                echo "<td>".$animal_dados['alimentacao']."</td>";
                echo "<td>".$animal_dados['risco_extincao']."</td>";
                echo "<td>".$animal_dados['migratorio']."</td>";
                echo "<td>".$animal_dados['perigo']."</td>";
                echo "<td>".$animal_dados['periodo_reprodutivo']."</td>";
                echo "<td>".$animal_dados['veneno']."</td>";
                echo "<td>".$animal_dados['filo']."</td>";
                echo "<td>".$animal_dados['classe']."</td>";
                echo "<td>".$animal_dados['ordem']."</td>";
                echo "<td>".$animal_dados['ritmo_circadiano']."</td>";
                echo "<td>".$animal_dados['num_avistado']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'dadosAnimaisLeigos.php?search='+search.value;
    }
</script>

</html>