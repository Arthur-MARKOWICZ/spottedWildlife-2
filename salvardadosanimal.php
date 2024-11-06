<?php
    include('conn.php');
    include('protect.php');
    $animal_id = $_POST['animal_id'];
    $nomeUsual = $_POST['txtNomeUsual'];
    $alimentacao = $_POST['txtAli'];
    $riscoExtincao = $_POST['txtExt'];
    $migratório = $_POST['txtMigr'];
    $nivelPerigo  = $_POST['txtNvlPerigo'];
    $periodoReprodutivo = $_POST['txtPerRep'];
    $veneno = $_POST['Veneno'];
    $filo = $_POST['txtFilo'];
    $classe = $_POST['txtClasse'];
    $ordem = $_POST['txtOrdem'];
    $ritimoCircadiano  = $_POST['RitmoCircadiano'];

        $sqlupdate = "UPDATE animais SET nome_usual='$nomeUsual' ,alimentacao='$alimentacao',migratório = '$migratório',risco_extincao='$riscoExtincao',perigo='$nivelPerigo',
        periodo_reprodutivo='$periodoReprodutivo', filo='$filo',classe='$classe',ordem='$ordem',veneno = '$veneno',ritmo_circadiano = '$ritimoCircadiano' 
        WHERE animal_id ='$animal_id' ";
        $result = $conn->query($sqlupdate);
        header('location: dadosanimal.php');
   
    

?>