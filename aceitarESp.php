<?php
    include('conn.php');
    include('protectadmin.php');
    $id = $_POST['usuario_id'];
    $sqlgra = ("SELECT graduacao FROM em_analise WHERE usuario_id = $id");
    $graduacao_resultado  = $conn->query($sqlgra);
    $valorgrad = $graduacao_resultado->fetch_assoc();
    $graduacao = $valorgrad['graduacao'];
    $insert = ("INSERT INTO especialistas(usuarios_id,formacao)
    values(?,?)");
    $stmt = $conn->prepare($insert);
    $stmt->bind_param("is", $id, $graduacao); 
    $stmt->execute();
    $delete = $conn->query("DELETE  FROM em_analise WHERE usuario_id = $id");
    header('location: verificarespecialista.php')
?>