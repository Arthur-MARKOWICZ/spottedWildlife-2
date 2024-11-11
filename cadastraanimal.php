<?php
  include('protectEspecialista.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="animalcadastro3.css"/>
    <link rel="stylesheet" href="navbar2.css"/>
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
  <?php include 'logo.php'; ?> <br><br>
    <div class= "conteiner">
    <nav class= "navbar">
      <?php include 'navbar.php'; ?>
      </nav>
      </nav>
    </div><br>
    <h2>cadastro de animais</h2><br>
<div class= "x">
      

    <form action="cadastranimal2.php" method="POST">
        Nome Usual: <input type="text" name="txtNomeUsual" id="txtNomeUsual" placeholder="Insira o nome usual do animal"/><br/>
        Alimentação: <input type="text" name="txtAli" id="txtAli" placeholder="Insira a alimentação do animal"/><br/>
        Risco de extinção: <input type="text" name="txtExt" id="txtExt" placeholder="Insira nivel de extinção"/><br/>
          <select id="Migratório" name="Migratório" required>
          <option value="0" disabled selected>Selecione se o animal é migratório ou não:</option>
          <option value="Migratório">Migratório</option>
          <option value="Não Migratório">Não migratório</option></select>
        Filo: <input type="text" name="txtFilo" id="txtFilo" placeholder="Insira o filo do animal"><br/>
        Classe: <input type="text" name="txtClasse" id="txtClasse" placeholder="Insira a classe do animal"><br/>
        Ordem: <input type="text" name="txtOrdem" id ="txtOrdem" placeholder="Insira a ordem do animal"><br/>
          <select id="Ritmo Circadiano" name="RitmoCircadiano" required>
          <option value="0" disabled selected>Selecione o Ritmo Circadiano:</option>
          <option value="Diurno">Matinal</option><br/>
          <option value="Noturno">Noturno</option><br/></select>
        Nivel de perigo: <input type="text" name="txtNvlPerigo" id="txtNvlPerigo" placeholder="Insira o nível de perigo do animal"/><br/>
        Periodo Reprodutivo: <input type="text" name="txtPerRep" id="txtPerRep" placeholder="Insira o período reprodutivo do animal" ><br/>
          <select id="Veneno" name="Veneno" required>
          <option value="0" disabled selected>Selecione se o animal é venenoso ou não:</option>
          <option value="Venenoso">Venenoso</option>
          <option value="Não Venenoso">Não venenoso</option></select>
          <input type="submit" value="Enviar"/>
    </form>
</div>
</body>
</html>