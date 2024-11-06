<?php
include('conn.php');
include('protectadmin.php');
$id = $_POST['analise_id'];
$delete = $conn->query("DELETE  FROM em_analise WHERE analise_id = $id");
header('location: verificarespecialista.php')
?>