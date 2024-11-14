<?php
   include('protect.php');

?>
<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index6.css" />
    <link rel="stylesheet" href="navbar2.css" />
    
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
          <?php include 'logo.php'; ?>

    <div class= "conteiner">
      
      <nav class= "navbar">
      <?php include 'navbar.php'; ?>
      </nav>
    </div>
    <h1>Home</h1>
    <div>
    <p>
        <h2>Bem vindo ao home <?php echo $_SESSION['name']; ?></h2>
    </p><br><br>
    </div>
    <h3>Nossos objetivos</h3>
    <div>
        “Spotted:Wildlife” é um projeto em que o objetivo é criar uma comunidade que possa compartilhar registro de animais em extinção por todo o país, visando a preservação dessas espécies, facilitando o trabalho de especialistas ao indicar onde indivíduos de determinadas espécies estão ou não sendo encontradas, e também fiscalizar ambientes para ocasionalmente analisar uma movimentação anormal de espécies em locais não habituais.
         <br>
          <h3> Sobre nós </h3>
         O projeto teve a iniciativa do grupo “OMC” formado por estudantes universitários, motivados por uma proposta de atividade acadêmica sobre preservação ambiental. 
    </div>
</body>
</html>
