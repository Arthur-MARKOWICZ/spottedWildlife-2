<?php 
include('conn.php');
     if(!isset($_SESSION)){
        session_start();
    }
    $usuarios_id = $_SESSION['id'];
    $sql = "SELECT usuarios_id from admin WHERE usuarios_id = $usuarios_id";
    $sqlE = "SELECT usuarios_id from especialistas WHERE usuarios_id = $usuarios_id";
    $result = $conn->query($sql);
    $resultE = $conn->query($sqlE);
    $quantidade = $result->num_rows;
    $quantidadeE = $resultE->num_rows;
    if($quantidade !=1 && $quantidadeE != 1){
       header('location: feed.php');
    }else if($quantidade == 1){
        header('location: feedadmin.php');
    }else{
        header('location: feedespecialista.php');
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