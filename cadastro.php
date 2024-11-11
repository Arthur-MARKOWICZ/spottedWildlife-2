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

    $senhaantes = $_POST['txtSenha'];
    
    $senha = password_hash($senhaantes, PASSWORD_DEFAULT);


    $data_nasc = $_POST['txtNasc'];
$sqlselect = "SELECT * from usuarios WHERE email_pessoal = '$email'";
$resulte = $conn->query($sqlselect);
$quantidade = $resulte->num_rows;
if ($quantidade != 0){
  echo "email ja cadastrado.";
  echo "<a href = 'cadastro.html'>voltar para o cadastro</a>";
}else{
  
$cadastro_sql = "INSERT INTO usuarios (nome, cpf, animal_fav, senha_user, nome_user, end_pais, end_cidade, telefone, email_pessoal, data_nasc, sexo, end_estado) 
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


  $stmt->execute();

    header("location: login.php");
  }
  ?>


