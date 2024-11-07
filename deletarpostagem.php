<?php
include('conn.php');
include('protectadmin.php');
    $id = $_POST['postagem_id'];
    $sqldelete = "DELETE FROM postagem WHERE postagem_id ='$id'";
    $resultdelete = $conn->query($sqldelete);
    header("location: feedadmin.php")
?>