<?php
 include('conn.php');
 include('protectadmin.php');
 if(!empty($_GET['idU'])){
    $id= $_GET['idU'];
    $sqlSelect = "SELECT ban from usuarios WHERE usuarios_id ='$id'";
    $result = $conn->query($sqlSelect);
    if($result->num_rows > 0 ){
        $sqlupdate = "UPDATE usuarios set ban = 1 WHERE usuarios_id = '$id'";
        $resultU = $conn->query($sqlupdate);
        header('location: dadosUsuarios.php');
    }
 }

?>