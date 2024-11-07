<?php 
    include('conn.php');
    include('protect.php');
    $nomeUsual = $_POST['txtNomeUsual'];
    $alimentacao = $_POST['txtAli'];
    $riscoExtincao = $_POST['txtExt'];
    $migratorio = $_POST['Migratório'];
    $ritimoCircadiano  = $_POST['RitmoCircadiano'];
    $nivelPerigo  = $_POST['txtNvlPerigo'];
    $periodoReprodutivo = $_POST['txtPerRep'];
    $veneno = $_POST['Veneno'];
    $filo = $_POST['txtFilo'];
    $classe = $_POST['txtClasse'];
    $ordem = $_POST['txtOrdem'];
    $usuarios_id = $_SESSION['id'];
    $_SESSION['nomeusual'] = $nomeUsual;
    $stmt = $conn->prepare("CALL animal_ja_cadastrado(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssissssssi", 
        $nomeUsual, 
        $alimentacao, 
        $riscoExtincao, 
        $migratorio, 
        $nivelPerigo, 
        $periodoReprodutivo, 
        $veneno, 
        $filo, 
        $classe, 
        $ordem, 
        $ritimoCircadiano, 
        $usuarios_id
    );
    $stmt->execute();

    header('location: cadastraanimal3.php')

?>
