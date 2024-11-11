<?php
    include('conn.php');
    include('protect.php');
    $id = $_SESSION['id'];
    $postagem_id = $_POST['postagem_id'];


    $sqldelete = "DELETE FROM like_postagem WHERE postagem_id = $postagem_id AND usuario_id = $id";
    $resultdelete = $conn->query($sqldelete);
    
    $stmt2 = $conn->prepare("UPDATE postagem SET num_like = num_like - 1 WHERE postagem_id = ?");
    $stmt2->bind_param("i", $postagem_id); 
    $stmt2->execute();
    
 

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