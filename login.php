<?php
include("conn.php");
if(isset($_POST['email'])||isset($_POST['senha'])){
    if(strlen($_POST['email'])==0){
        echo "preencha seu email"; 
    }if(strlen($_POST['senha'])==0){
        echo "preencha sua senha";
    }else{
        $email =$conn->real_escape_string($_POST['email']);
        $senhaentrada =$conn->real_escape_string($_POST['senha']);
        $sql = "SELECT senha_user FROM usuarios WHERE email_pessoal='$email'";
        $resultS = $conn->query($sql);
        $resultI = $resultS-> fetch_array();
        $senhaarmazenada = $resultI['senha_user'];
        $senha = password_verify($senhaentrada, $senhaarmazenada);
        $sql_code = "SELECT * FROM usuarios WHERE email_pessoal='$email' AND senha_user='$senhaarmazenada' ";
        $sql_query = $conn->query($sql_code) or die("falha na execucao do codigo: ".$mysqli->error); 
        $quantidade = $sql_query->num_rows;
        $result = $sql_query->fetch_assoc();
        if($result['ban'] == 0){
        if($quantidade==1){

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['senha'] =  $senhaentrada;
            $_SESSION['id'] = $result['usuarios_id'];
            $_SESSION['name'] = $result['nome_user'];
            header("location: index.php");
        } else{
            echo "Falha ao logar! Email ou senha incorretos";
        }
    }
    else{
        echo "Voce foi banido do site.";
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login4.css" />
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
<?php include 'logo.php'; ?><br>
<div class = 'loginBox'>
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
            <button><a href="cadastro1.php" class="botao">Cadastrar-se</a></button>
        </form>
</div>
</body>
</html>