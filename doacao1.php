<?php
include('protect.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="doacao5.css" />
    <link rel="stylesheet" href="navbar.css"/>
    <title>Fazer Doação</title>
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
      new window.VLibras.Widget("https://vlibras.gov.br/app");
    </script>
    <header>
      <img src="" alt="" />
    </header>
    <div class="conteiner">
      <nav class="navbar">
        <?php include 'navbar.php'; ?>
      </nav>
    </div>
    <br /><br />

    <form method="POST" action="doacao.php">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required />

      <label for="valor">Valor da Doação (R$):</label>
      <input type="number" id="valor" name="valor" step="0.01" required />

      <label for="metodo">Método de Pagamento:</label>
      <select id="metodo" name="metodo" required>
        <option value="Pix">Pix</option>
      </select>

      <button type="submit">Próximo</button>
    </form>
    <footer>
      <br>
      <p>OMC 2024 - Todos os direitos reservados</p>
      
    </footer>
  </body>
</html>
