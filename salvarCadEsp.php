<?php
include('protect.php');
include('conn.php');
$usuario_id = $_SESSION['id'];
$graduacao = $_POST['txtgraduacao'];
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    $conteudoArquivo = file_get_contents($_FILES['imagem']['tmp_name']);
    $imageType = $_FILES['imagem']['type']; 
} else {

    $conteudoArquivo = null;
    $imageType = null;
}
$stmt = $conn->prepare("INSERT INTO em_analise(usuario_id,graduacao,imagem,imagem_tipo)
VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $usuario_id, $graduacao,$conteudoArquivo, $imageType);
if ($stmt->execute()) {
    echo "Postagem salva com sucesso<br><br><a href='index.php'>Voltar para página inicial</a>";
} else {
    echo "Erro ao fazer a postagem: " . $stmt->error;
}


?>