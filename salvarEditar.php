<?php
    include('conn.php');
    include('protect.php');
        $id = $_SESSION['id'];
        $nome = $_POST['txtName'];
        $cpf = $_POST['txtCPF'];
        $email = $_POST['txtEmail'];
        $senha = $_POST['txtSenha'];
        $dataNasc = $_POST['txtNasc'];
        $telefone = $_POST['txtTel'];
        $pais = $_POST['end_pais'];
        $estado = $_POST['end_estado'];
        $animalFav = $_POST['txtAF'];
        $nome_user = $_POST['txtNU'];
        $cidade = $_POST['end_cidade'];
        $sexo = $_POST['optGender'];

        $sqlupdate = "UPDATE usuarios SET nome='$nome' ,cpf= $cpf,email_pessoal = '$email',senha_user='$senha',data_nasc='$dataNasc',
        telefone='$telefone',end_pais ='$pais', end_cidade='$cidade',animal_fav='$animalFav',nome_user='$nome_user', sexo ='$sexo', end_estado = '$estado'
        WHERE usuarios_id ='$id' ";
        $result = $conn->query($sqlupdate);
        header('location: dados.php');

?>