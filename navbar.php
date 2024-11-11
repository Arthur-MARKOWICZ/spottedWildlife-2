<?php
include('conn.php');
$usuarios_id = $_SESSION['id'];


    $sql = "SELECT usuarios_id, admin_id FROM admin WHERE usuarios_id = $usuarios_id";
    $sqlE = "SELECT usuarios_id, especialista_id FROM especialistas WHERE usuarios_id = $usuarios_id";
    $result = $conn->query($sql);
    $resultE = $conn->query($sqlE);
    $admin_id = $result && $result->num_rows > 0 ? mysqli_fetch_assoc($result)['admin_id'] : null;
    $especialista_id = $resultE && $resultE->num_rows > 0 ? mysqli_fetch_assoc($resultE)['especialista_id'] : null;

?>
<div>
    <nav class = "navbar">

        <ul>
            <?php if (isset($_SESSION['id'])): ?>
                <a href="index.php">Home</a>|
                <a href="protectfeed.php">Feed</a>|
                <a href="protectdadosanimais.php">Dados dos animais</a>|
                <a href="postagem.php">Postagem</a>|
                <a href="dados.php">Dados do cadastro</a>|
                <a href="cadastroespecialista.php">Cadastro de especialistas</a>|
                <a href="doacao1.php">Doação</a>|


                <?php if ($especialista_id || $admin_id): ?>
                    <a href="cadastraanimal.php">Cadastro de Animais</a>|
            <?php endif; ?>

                    <?php if ($admin_id): ?>
                    <a href="dadosUsuarios.php">Dados de usuarios</a>|
                <a href="verificarespecialista.php">Aceitar especialista</a>|
                <a href="filtro.php">Gerar relatorio</a>|

                <?php endif; ?>


                <a href="logout.php" >Sair</a>


            <?php endif; ?>
        </ul>
    </nav>
</div>