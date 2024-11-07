<?php
include("conn.php");
if(isset($_POST['email'])||isset($_POST['senha'])){
    if(strlen($_POST['email'])==0){
        echo "preencha seu email"; 
    }else if(strlen($_POST['senha'])==0){
        echo "preencha sua senha";
    }else{
        $email =$conn->real_escape_string($_POST['email']);
        $senha =$conn->real_escape_string($_POST['senha']);
        $sql_code = "SELECT * FROM usuarios WHERE email_pessoal='$email' AND senha_user='$senha' ";
        $sql_query = $conn->query($sql_code) or die("falha na execucao do codigo: ".$mysqli->error); 
        $quantidade = $sql_query->num_rows;
        if($quantidade==1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $usuario['usuarios_id'];
            $_SESSION['name'] = $usuario['nome_user'];
            header("location: index.php");
        } else{
            echo "Falha ao logar! Email ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login2.css" />
    <title>login</title>
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

<div class="box">
        <h1>Acesse sua conta</h1>
        <form action="" method="POST">
            <p>
                <label>Email</label>
                <input type="text" name="email">
            </p>
            <p>
                <label>Senha</label>
                <input type="password" name="senha">
            </p>
            <p>
                <button type="submite">Entrar</button>
            </p>
            <button><a href="cadastro.html" class="botao">Cadastrar-se</a></button>
        </form>
</div>
</body>
</html>