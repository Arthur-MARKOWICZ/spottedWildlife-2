<?php 
include('conn.php');
     if(!isset($_SESSION)){
        session_start();
    }
    $usuarios_id = $_SESSION['id'];
    $sql = "SELECT usuarios_id from admin WHERE usuarios_id = $usuarios_id";
    $result = $conn->query($sql);
    $quantidade = $result->num_rows;
    if($quantidade !=1 ){
        die("Você não pode acessar esta página: porque não esta logado.<p><a class= 'botao' href=\"login.php\">entrar </p>");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="protect.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
