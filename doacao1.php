<?php
include('protect.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="doacao5.css" />
    <link rel="stylesheet" href="navbar2.css"/>
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
           <?php include 'logo.php'; ?>
    <div class="conteiner">
      <nav class="navbar">
        <?php include 'navbar.php'; ?>
      </nav>
    </div>
    <br /><br />
            O projeto não tem intuito financeiro e é não-governamental, ademais existe um custo de R$50,00 mensais para se manter ativo, todo o dinheiro arrecadado no mês será primeiramente e exclusivamente utilizado para ajudar a arcar com os custos, caso os valores arrecadados excedam os custos, uma parte será guardada para os custos do mês seguinte, e todo o restante será redirecionado à ONGs selecionadas de preservação de animais.

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
  </body>
</html>
