<?php
    include('conn.php');
    include('protectadmin.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="relatorio2.css" />
    <link rel="stylesheet" href="navbar.css"/>
    <title>Filtros para Geração de Relatório</title>
</head>
<body>
<nav class= "navbar">
      <?php include 'navbar.php'; ?>
</nav>
      <div class="container">
  <div class="form-container">
    <h1>Filtros para Geração de Relatório</h1>
    <form action="relatorio.php" method="POST">
      <label for="txtfilo">Filo:</label>
      <input type="text" name="txtfilo" id="txtfilo" placeholder="filo">
      <label for="txtclasse">Classe:</label>
      <input type="text" name="txtclasse" id="txtclasse" placeholder="classe">
      <label for="txtordem">Ordem:</label>
      <input type="text" name="txtordem" id="txtordem" placeholder="ordem">
      <button type="submit">Gerar Relatório</button>
    </form>
  </div>
</div>
    <footer>
      <br>
      <p>OMC 2024 - Todos os direitos reservados</p>
    </footer>
</body>
</html>
