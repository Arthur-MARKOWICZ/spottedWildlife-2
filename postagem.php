<?php
    include('conn.php');
    include('protect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="postagem2.css" />
    <link rel="stylesheet" href="navbar2.css"/>
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
    <section>
    <?php include 'logo.php'; ?><br><br>
    <div class= "conteiner">
    <nav class= "navbar">
      <?php include 'navbar.php'; ?>
      </nav>
    </div>
    </section><br><br>
    <h1> Postagem</h1>
    <div class="formulario"  >
            <form enctype="multipart/form-data" action="salvarpostagem.php" method="POST" onsubmit="return verificarTamanhoArquivo();">
                
                Título da postagem <input type='textarea' name='txtnomepostagem' maxlength="500" placeholder="titulo da postagem"><br><br>
                Comentários <textarea name="comentario" placeholder="comentario"></textarea><br>
                Cidade <input type="textarea" maxlength="500" name="txtcidade" placeholder="Cidade do avistamento"><br>
                Animal <input type="textarea" maxlength="500" name="txtanimal" placeholder="Nome do animal avistado"><br>
                Selecione o arquivo <input type="file" name="imagem" id="imagem">
                <input type = "submit" name="enviar" value="publicar"><br>
            </form>
    </div>
</body>
<script>
        function verificarTamanhoArquivo() {
            const arquivoInput = document.getElementById('imagem');
            const arquivo = arquivoInput.files[0];
            if (arquivo) {
                const tamanhoMaximo = 16777216;
                if (arquivo.size > tamanhoMaximo) {
                    alert('Arquivo muito grande! O tamanho máximo é de 16 MB.');
                    arquivoInput.value = ''; 
                    return false; 
                }
            }
            const extensoesPermitidas = /(\.jpg|\.jpeg|\.png|\.gif|\.jfif|)$/i;
            if (!extensoesPermitidas.exec(arquivo.name)) {
                alert('Formato de arquivo inválido! Apenas imagens no formato de JPG, JPEG, PNG, GIF .');
                arquivoInput.value = ''; 
                return false; 
            }
            return true;
        }
    </script>
</html>