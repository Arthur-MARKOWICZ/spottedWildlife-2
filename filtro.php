<?php
    include('conn.php');
    include('protectadmin.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="relatorio.css" />
    <title>Filtros para Geração de Relatório</title>
</head>
<body>
<nav class= "navbar">
      <?php include 'navbar.php'; ?>
      </nav>
    <h1>Filtros para Geração de Relatório</h1>
    <form action="relatorio.php" method="POST">
        Filo:<input type="text" name="txtfilo" id="txtfilo" placeholder="filo" >
        Classe: <input type="text" name="txtclasse" id="txtclasse" placeholder="classe">
        Ordem: <input type="text" name="txtordem" id="txtordem" placeholder="ordem">
        <input type="submit" value="relatorio">
    </form>
</body>
</html>
