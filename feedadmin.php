<?php
include('conn.php');
include('protectadmin.php');
if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sqlP =  "SELECT *
        FROM postagem p
        JOIN usuarios u ON p.usuarios_id = u.usuarios_id
         WHERE nome_animal LIKE '%$data%' ORDER BY p.postagem_id DESC";
}
else
{
    $sqlP = "SELECT *
        FROM postagem p
        JOIN usuarios u ON p.usuarios_id = u.usuarios_id
        ORDER BY p.postagem_id DESC";

}
$resultP = $conn->query($sqlP)
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feed4.css" />
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
    </div><br><br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button></div><br><br>


<?php
$sql = "SELECT *
        FROM postagem p
        JOIN usuarios u ON p.usuarios_id = u.usuarios_id
        ORDER BY p.postagem_id DESC";

$result = $conn->query($sql);

if ($resultP->num_rows > 0) {
    while ($postagem = $resultP->fetch_assoc()) {
        $id = $postagem['postagem_id'];
        $nome = htmlspecialchars($postagem['nome_user']); 
        $titulo = htmlspecialchars($postagem['titulo']);
        $cidade = htmlspecialchars($postagem['cidade']);
        $animal = htmlspecialchars($postagem['nome_animal']);
        $comentario = htmlspecialchars($postagem['comentarios']);
        $data = htmlspecialchars($postagem['data_postagem']);
        echo "<div class = 'feed'>";
        echo "<h2>$titulo</h2>";
        if($postagem['verificada'] != 0){
          echo "postagem verificada <br><br>";
        }
        echo "<img src='imagem.php?id=$id' alt='Imagem da postagem' width='40%' height='40%'>";
        echo "<h4>$comentario</h4>";
        echo "<h4>$animal</h4>";
        echo "<h4>$cidade</h4>";
        echo "<h4>$data</h4>";
        echo "<h4>$nome</h4>";
        echo "<td>
                    <form action='verificarpostagem.php' method='post'>
                        <button  class = 'botao'type='submit' name='postagem_id' value='".$postagem['postagem_id']."'>Verificar</button>
                    </form><br><br>
                  </td>";
                  echo "<td>
                  <form action='deletarpostagem.php' method='post'>
                      <button  class = 'botao'type='submit' name='postagem_id' value='".$postagem['postagem_id']."'>deletar</button>
                  </form>
                </td>";
        echo"</div>";  
    }
} else {
    echo "<p>Nenhuma postagem encontrada.</p>";
}
?>
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
        window.location = 'feedadmin.php?search='+search.value;
    }
</script>
</html>