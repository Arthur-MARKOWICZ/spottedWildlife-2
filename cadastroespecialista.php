<?php
    include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CADASTROESP2.css"/>
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
  <?php include 'logo.php'; ?><br><br>
    <div class= "conteiner">
      
    <nav class= "navbar">
      <?php include 'navbar.php'; ?>
      </nav>
      
    </div><br><br>
    <H2> CADASTRO ESPEICALISTA</H2>
      <h2>Faça aqui a petição para fazer parte da nossa comunidade de especialista</h2>
    <form action="salvarCadEsp.php" method="POST" enctype="multipart/form-data"  onsubmit="return verificarTamanhoArquivo();">

      Graduação <input type="text" name="txtgraduacao" id="graduacao" placeholder="Insira aqui no que você é formado">
      Insira uma foto do seu diploma <input type="file" name="imagem" id="diploma">
      <input type = "submit" name="enviar" value="publicar"><br>
    </form>
    <script>
        function verificarTamanhoArquivo() {
            const arquivoInput = document.getElementById('diploma');
            const arquivo = arquivoInput.files[0];
            if (arquivo) {
                const tamanhoMaximo = 16777216; // 16 MB em bytes
                if (arquivo.size > tamanhoMaximo) {
                    alert('Arquivo muito grande! O tamanho máximo é de 16 MB.');
                    arquivoInput.value = ''; 
                    return false; 
                }
            }
            const extensoesPermitidas = /(\.jpg|\.jpeg|\.png|\.gif|\.jfif|)$/i;
            if (!extensoesPermitidas.exec(arquivo.name)) {
                alert('Formato de arquivo inválido! Apenas imagens no formato de JPG, JPEG, PNG, GIF.');
                arquivoInput.value = ''; 
                return false; 
            }
            return true;
        }
    </script>
</body>