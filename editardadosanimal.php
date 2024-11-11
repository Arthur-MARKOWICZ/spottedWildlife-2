<?php 
    include('conn.php');
    include('protect.php');
    if (isset($_POST['animal_id'])) {
        $animal_id = $_POST['animal_id'];
        $sqlselctdados ="SELECT * FROM animais WHERE animal_id = $animal_id";
        $result = $conn->query($sqlselctdados);
        while($animaldados = mysqli_fetch_assoc($result)){
            $nome = $animaldados['nome_usual'];
            $alimentacao = $animaldados['alimentacao'];
            $riscoExtincao = $animaldados['risco_extincao'];
            $migratorio = $animaldados['migratorio'];
            $perigo = $animaldados['perigo'];
            $periodoReprodutivo = $animaldados['periodo_reprodutivo'];
            $veneno = $animaldados['veneno'];
            $filo = $animaldados['filo'];
            $classe = $animaldados['classe'];
            $ordem = $animaldados['ordem'];
            $ritmoCircadiano = $animaldados['ritmo_circadiano'];
            $avistado = $animaldados['num_avistado'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="editardadosanimal2.css"/>
    <link rel="stylesheet" href="navbar2.css"/>
</head>
<body>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
           <?php include 'logo.php'; ?>
       <nav class= "navbar">
      <?php include 'navbar.php'; ?>
      </nav>
    <div>
        <form action="salvardadosanimal.php" method="POST">
            Nome Usual: <input type="text" name="txtNomeUsual" id="txtNomeUsual" value="<?php echo $nome ?>" placeholder="Insira o nome usual do animal"/><br/>
            Alimentação: <input type="text" name="txtAli" id="txtAli" value="<?php echo $alimentacao ?>" placeholder="Insira a alimentação do animal"/><br/>
            Risco de extinção: <input type="text" name="txtExt" id="txtExt"value="<?php echo $riscoExtincao ?>" placeholder="Insira nivel de extinção"/><br/>
            <select id="Migratório" name="Migratório" required>
            <option value="0" disabled selected>Selecione se o animal é migratório ou não:</option>
            <option value="Migratório"<?php echo ($migratorio == "Migratório") ? 'selected' : ''; ?>>Migratório</option>
            <option value="Não Migratório"<?php echo ($migratorio == "Não Migratório") ? 'selected' : ''; ?>>Não migratório</option>
            Filo: <input type="text" name="txtFilo" id="txtFilo" value="<?php echo $filo ?>"placeholder="Insira o filo do animal"><br/>
            Classe: <input type="text" name="txtClasse" id="txtClasse" value="<?php echo $classe ?> "placeholder="Insira a classe do animal"><br/>
            Ordem: <input type="text" name="txtOrdem" id ="txtOrdem" value="<?php echo $ordem ?>"placeholder="Insira a ordem do animal"><br/>
            <select id="RitmoCircadiano" name="RitmoCircadiano" required>
            <option value="0" disabled selected>Selecione o Ritmo Circadiano:</option>
            <option value="Diurno"<?php echo ($ritmoCircadiano == "Diurno") ? 'selected' : ''; ?>>Matinal</option><br/>
            <option value="Noturno"<?php echo ($ritmoCircadiano == "Noturno") ? 'selected' : ''; ?>>Noturno</option><br/></select>
            Nivel de perigo: <input type="text" name="txtNvlPerigo" id="txtNvlPerigo" value="<?php echo $perigo ?>" placeholder="Insira nível de perigo do animal"/><br/>
            Periodo Reprodutivo: <input type="text" name="txtPerRep" id="txtPerRep" value="<?php echo $periodoReprodutivo ?> "placeholder="Insira  périodo reprodutivo do animal" ><br/>
            <select id="Veneno" name="Veneno" required>
            <option value="0" disabled selected>Selecione se o animal é venenoso ou não:</option>
            <option value="Venenoso" <?php echo ($veneno == "Venenoso") ? 'selected' : ''; ?>>Venenoso</option>
            <option value="Não venenoso" <?php echo ($veneno == "Não venenoso") ? 'selected' : ''; ?>>Não venenoso</option>
            </select>
            <input type="number" id="valor" name="avistado" value="<?php echo $avistado ?>"step="1" />
            <button class="botao" type="submit" name="animal_id" value="<?= $animal_id ?>">Enviar</button>
            </form>
    </div>
</body>
</html>