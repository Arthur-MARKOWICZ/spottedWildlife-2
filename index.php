<?php
   include("protect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" />
    
    <title>home</title>
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
<header>
      <img src="" alt="" />
    </header>
    
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
    <h1>Home</h1>
    <div>
    <p>
        <h2>Bem vindo ao home <?php echo $_SESSION['name']; ?></h2>
    </p><br><br>
    </div>
    <div>
        “Spotted:Wildlife” é um projeto que tem o objetivo de ajudar na preservação de espécies de animais, 
        catalogação de onde estes animais (ameaçados de extinção) estão pelo mundo, e como eles se comportam na natureza.
        O projeto não tem intuito financeiro e é não-governamental, o dinheiro arrecadado será usado para manter o site 
        no ar e o sobressalente será doado para outras instituições. 
    </div>
</body>
</html>