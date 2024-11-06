<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  

    $stmt = $conn->prepare("SELECT imagem, imagem_tipo FROM postagem WHERE postagem_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($imagem, $imageTipo);
        $stmt->fetch();


        header("Content-Type: $imageTipo");


        echo $imagem;
    } else {
        echo "Imagem não encontrada.";
    }

    $stmt->close();
} else {
    echo "ID da postagem não fornecido.";
}

$conn->close();
?>
