    <?php
    include('conn.php');
    include('protect.php');

    $titulo = $_POST['txtnomepostagem'];
    $comentario = $_POST['comentario'];
    $usuario_id = $_SESSION['id'];
    $cidade = $_POST['txtcidade'];
    $nomeAnimal = $_POST['txtanimal'];


    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $conteudoArquivo = file_get_contents($_FILES['imagem']['tmp_name']);
        $imageType = $_FILES['imagem']['type']; 
    } else {
    
        $conteudoArquivo = null;
        $imageType = null;
    }

    $stmt = $conn->prepare("INSERT INTO postagem(titulo, comentarios, usuarios_id, cidade, nome_animal, imagem, imagem_tipo) 
    VALUES (?, ?, ?, ?, ?, ?, ?)");


    $stmt->bind_param("sssssss", $titulo, $comentario, $usuario_id, $cidade, $nomeAnimal, $conteudoArquivo, $imageType);

    if ($stmt->execute()) {
        echo "Postagem salva com sucesso<br><br><a href='index.php'>Voltar para página inicial</a>";
    } else {
        echo "Erro ao fazer a postagem: " . $stmt->error;
    }

    $stmt->close();
    ?>
