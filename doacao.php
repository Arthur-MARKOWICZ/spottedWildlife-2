<?php

class Doacao {
    public $nome;
    public $valor;
    public $metodo;

    function realizarDoacao($nome, $valor, $metodo) {
        $this->nome = htmlspecialchars($nome);
        $this->valor = htmlspecialchars($valor);
        $this->metodo = htmlspecialchars($metodo);

        if ($this->metodo === 'Pix') {
            $this->exibirInstrucoesPix();
        }
    }

    function exibirInstrucoesPix() {
        echo "<p>Para concluir a doação, envie o valor para o seguinte código Pix:</p>";
        echo "<p><strong>123.456.789-00</strong> (CNPJ da instituição)</p>";
        echo "<p>Após o pagamento, você receberá um e-mail de confirmação.</p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];
    $metodo = $_POST["metodo"];

    $doacao = new Doacao();
    $doacao->realizarDoacao($nome, $valor, $metodo);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="doacao_agradecimento.css" />
    <title>Confirmação de Doação</title>
</head>
<body>
    <div class="container">
        
        <form action="doacao_agradecimento.html" method="POST">
            <button type="submit" class="botao-concluir">Concluir Doação</button>
        </form>
    </div>
</body>
</html>
