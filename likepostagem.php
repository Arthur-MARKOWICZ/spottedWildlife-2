<?php
    include('conn.php');
    include('protect.php');
    $postagem_id = $_POST['postagem_id'];
    $stmt = $conn->prepare("UPDATE postagem SET num_like = num_like + 1 WHERE postagem_id = ?");
    $stmt->bind_param("i", $postagem_id); 
    $stmt->execute();
    $id = $_SESSION['id'];
    $sqlE = "SELECT especialista_id from especialistas WHERE usuarios_id = '$id'";  
    $resultE = $conn->query($sqlE);
    $sqlA = "SELECT admin_id from admin WHERE usuarios_id = '$id'";  
    $resultA = $conn->query($sqlA);
    $valorA = $resultA->num_rows;
    $valorE = $resultE->num_rows;
    if($valorA > 0 ){
        header('location: feedadmin.php');
    }
    else if($valorE > 0 ){
        header('location: feedespecialista.php');
    }else{
        header('location: feed.php');
    }

?>