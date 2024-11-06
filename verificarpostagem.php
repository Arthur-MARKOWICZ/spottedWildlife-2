<?php
include('conn.php');
include('protectEspecialista');
$id = $_POST['postagem_id'];
$sqlupdate = "UPDATE postagem SET verificada='1'
        WHERE postagem_id ='$id' ";
        $result = $conn->query($sqlupdate);
        header('location: feedespecialista.php');
?>