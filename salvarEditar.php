<?php
    include('conn.php');
    include('protect.php');
        $id = $_SESSION['id'];
        $nome = $_POST['txtName'];
        $cpf = $_POST['txtCPF'];
        $email = $_POST['txtEmail'];
        $dataNasc = $_POST['txtNasc'];
        $telefone = $_POST['txtTel'];
        $pais = $_POST['end_pais'];
        $estado = $_POST['end_estado'];
        $animalFav = $_POST['txtAF'];
        $nome_user = $_POST['txtNU'];
        $cidade = $_POST['end_cidade'];
        $sexo = $_POST['optGender'];
        $senhaantes = $_POST['txtSenha'];
        $_SESSION['senha'] = $senhaantes;
        $senha = password_hash($senhaantes, PASSWORD_DEFAULT);

       
mysqli_query($conn, "SET autocommit = FALSE");

mysqli_query($conn, "START TRANSACTION");

mysqli_query($conn, "SAVEPOINT dados_antigos");

$sqlupdate = "
    UPDATE usuarios 
    SET nome = '$nome', 
        cpf = '$cpf', 
        email_pessoal = '$email', 
        senha_user = '$senha', 
        data_nasc = '$dataNasc', 
        telefone = '$telefone', 
        end_pais = '$pais', 
        end_cidade = '$cidade', 
        animal_fav = '$animalFav', 
        nome_user = '$nome_user', 
        sexo = '$sexo', 
        end_estado = '$estado'
    WHERE usuarios_id = '$id';
";

if (mysqli_query($conn, $sqlupdate)) {
    
    $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuarios_id = '$id'");
    
    mysqli_query($conn, "COMMIT");
    
    while ($linha = mysqli_fetch_assoc($result)) {
        print_r($linha);
    }
} else {

    mysqli_query($conn, "ROLLBACK TO SAVEPOINT dados_antigos");
}

mysqli_query($conn, "SET autocommit = TRUE");
        $result = $conn->query($sqlupdate);
        header('location: dados.php');

?>
