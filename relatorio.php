<?php
    include('conn.php');
    include('protect.php');
    $filo = $_POST['txtfilo'];
    $classe = $_POST['txtclasse'];
    $ordem = $_POST['txtordem'];
    if(!empty($filo)){
    $sqlfilo = "SELECT * from animais WHERE filo like'%$filo%'";
    $resultfilo = $conn->query($sqlfilo);
    }else{
        $resultfilo = false;
    }
    if(!empty($classe)){
    $sqlclasse = "SELECT * from animais WHERE classe like '%$classe%'";
    $resultclasse = $conn->query($sqlclasse);
    }else{
        $resultclasse = false;
    }
    if(!empty($ordem)){
    $sqlordem = "SELECT * from animais WHERE ordem like '%$ordem%'";
    $resultordem = $conn->query($sqlordem);
    }else{
        $resultordem = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="relatorio2.css" />
    <link rel="stylesheet" href="navbar2.css"/>
    <title>Relatório</title>
</head>
<body>
<?php include 'logo.php'; ?>
<nav class= "navbar">
      <?php include 'navbar.php'; ?>
      </nav>
<?php if ($resultfilo && $resultfilo->num_rows > 0): ?>      
<div class="filo">
        <h1>Filo: <?php echo htmlspecialchars($filo); ?></h1>
            <ul>
                <?php while ($row = $resultfilo->fetch_assoc()): ?>
                    <li><?php echo htmlspecialchars($row['nome_usual']); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Nenhum resultado encontrado para o filo.</p>
        <?php endif; ?>
    </div>
    <?php if ($resultclasse && $resultclasse->num_rows >0 ): ?>
<div class="classe">
        <h1>Classe: <?php echo htmlspecialchars($classe); ?></h1>
            <ul>
                <?php while ($rowC = $resultclasse->fetch_assoc()): ?>
                    <li><?php echo htmlspecialchars($rowC['nome_usual']); ?></li>
                <?php endwhile; ?>
            </ul> 
        <?php else: ?>
    <p>Nenhum resultado encontrado para a classe.</p>
        <?php endif; ?>
    </div>
    <?php if ($resultordem): ?>
<div class="ordem">
        <h1>Ordem: <?php echo htmlspecialchars($ordem); ?></h1>

            <ul>
                <?php while ($row = $resultordem->fetch_assoc()): ?>
                    <li><?php echo htmlspecialchars($row['nome_usual']); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Nenhum resultado encontrado para a ordem.</p>
        <?php endif; ?>
    </div>
</body>
<script>
    var search = document.getElementById('Pesquisar');
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });
    function searchData()
    {
        window.location = 'relatorio.php?search='+search.value;
    }
</script>
</html>