<?php
include('conn.php');
include('protectadmin.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feed.css" />
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
    </div>

<?php
$sql = "SELECT *
        FROM postagem p
        JOIN usuarios u ON p.usuarios_id = u.usuarios_id
        ORDER BY p.postagem_id DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($postagem = $result->fetch_assoc()) {
        $id = $postagem['postagem_id'];
        $nome = htmlspecialchars($postagem['nome_user']); 
        $titulo = htmlspecialchars($postagem['titulo']);
        $cidade = htmlspecialchars($postagem['cidade']);
        $animal = htmlspecialchars($postagem['nome_animal']);
        $comentario = htmlspecialchars($postagem['comentarios']);
        $data = htmlspecialchars($postagem['data_postagem']);

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
    }
} else {
    echo "<p>Nenhuma postagem encontrada.</p>";
}
?>
</body>
</html>