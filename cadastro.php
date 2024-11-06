<?php
 
  include("conn.php");

    $email = $_POST['txtEmail'];

    $nome = $_POST['txtName'];
  
    $cpf = $_POST['txtCPF'];

    $sexo = $_POST['optGender'];

    $pais = $_POST['end_pais'];

    $estado = $_POST['end_estado'];

    $cidade = $_POST['end_cidade'];

    $telefone = $_POST['txtTel'];

    $animailFav = $_POST['txtAF'];

    $nomeUsuario = $_POST['txtNU'];

    $senha = $_POST['txtSenha'];


    $data_nasc = $_POST['txtNasc'];

  
$cadastro_sql = "INSERT INTO usuarios (nome, cpf, animal_fav, senha_user, nome_user, end_pais, 
    end_cidade, telefone, email_pessoal, data_nasc, sexo, end_estado) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($cadastro_sql);
    $stmt->bind_param(
        "ssssssssssss",
        $nome,
        $cpf,
        $animalFav,
        $senha,
        $nomeUsuario,
        $pais,
        $cidade,
        $telefone,
        $email,
        $data_nasc,
        $sexo,
        $estado
    );


  $stmt->execute()



  ?>


<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="cadastrophp.css" />
    <title>Cadastro</title>
  </head>
  <body>
    <header>
      <img src="" alt="" />
    </header>
    <h1>Cadastro</h1>
    Seu cadastro foi feito
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
    <a href="login.php" class="botao">Login</a>
  </html>