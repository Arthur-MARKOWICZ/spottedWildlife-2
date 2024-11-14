<?php
include('conn.php');
class Doacao {
    public $nome;
    public $valor;
    public $metodo;

    function realizarDoacao($nome, $valor, $metodo) {
        $this->nome = htmlspecialchars($nome);
        $this->valor = htmlspecialchars($valor);
        $this->metodo = htmlspecialchars($metodo);

        if ($this->metodo === 'Pix') {
            echo '<div class="pix-instrucoes">';
            $this->exibirInstrucoesPix();
            echo '</div>';
        }
    }

    function exibirInstrucoesPix() {

    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];
    $metodo = $_POST["metodo"];

    $stmt = $conn->prepare("INSERT into doacao(valor,nome) values(?,?)");
    $stmt->bind_param("ss", $valor, $nome);
    $stmt->execute();

    $doacao = new Doacao();
    $doacao->realizarDoacao($nome, $valor, $metodo);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Doação</title>
    <link rel="stylesheet" href="doacao3.css">
</head>
<body>
    <div class="container">
        <?php

        echo "<p>Para concluir a doação, envie o valor para o seguinte código Pix:</p>";
        echo "<p><strong>+55 (41) 99156-2507</strong> (telefone)</p>";
        echo "<p>Após o pagamento, você receberá um e-mail de confirmação.</p>";
        ?>
        
        <form action="doacao_agradecimento.html" method="POST">
            <button type="submit" class="botao-concluir">Concluir Doação</button>
        </form>
    </div>
</body>
</html>
