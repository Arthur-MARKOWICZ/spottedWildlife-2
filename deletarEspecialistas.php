<?php
include('conn.php');
include('protectadmin.php');
if(!empty($_GET['idU'])){
    $id= $_GET['idU'];
    $sqlSelect = "SELECT * from especialistas WHERE usuarios_id ='$id'";
    $result = $conn->query($sqlSelect);
    if($result->num_rows > 0 ){
        $sqldelete = "DELETE FROM especialistas WHERE usuarios_id ='$id'";
        $resultdelete = $conn->query($sqldelete);
    }
}
header('location: dadosEsp.php')
?>