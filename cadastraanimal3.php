<?php
    include('conn.php');
    include('protect.php');
    $nomeUsual = $_SESSION['nomeusual'];
    $sql = "SELECT * from animais WHERE nome_usual = '$nomeUsual'";
    $query = $conn->query($sql);
    $result  = $query->fetch_assoc();
    $alimentacao = $result['alimentacao'];
    $riscoExtincao = $result['risco_extincao'];
    $migratorio = $result['migratorio'];
    $ritimoCircadiano  = $result['ritmo_circadiano'];
    $nivelPerigo  = $result['perigo'];
    $periodoReprodutivo = $result['periodo_reprodutivo'];
    $veneno = $result['veneno'];
    $filo = $result['filo'];
    $classe = $result['classe'];
    $ordem = $result['ordem'];
    $animal_id = $result['animal_id'];
    $stmt2 = $conn->prepare("INSERT INTO filos(animal_id,nome_filo) values(?,?)");
    $stmt2->bind_param("ss",$animal_id,$filo); 
    $stmt2->execute();
    $stmt3 = $conn->prepare("INSERT INTO classes(animal_id,nome_classe) values(?,?)");
    $stmt3->bind_param("ss",$animal_id,$classe); 
    $stmt3->execute();
    $stmt4 = $conn->prepare("INSERT INTO ordens(animal_id,nome_ordem) values(?,?)");
    $stmt4->bind_param("ss",$animal_id,$ordem); 
    $stmt4->execute();
    header('location: dadosanimal.php')
?>