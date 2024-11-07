<?php
include('conn.php');
include('protect.php');
$data_inicial = $_POST['data_inicial'] ?? null;
$data_final = $_POST['data_final'] ?? null;
$categoria = $_POST['categoria'] ?? '';
$status = $_POST['status'] ?? '';
$ordenar_por = $_POST['ordenar_por'] ?? 'data';
$agrupar_por = $_POST['agrupar_por'] ?? 'nenhum';
$formato = $_POST['formato'] ?? 'pdf';

$sql = "SELECT * FROM tabela_relatorio WHERE data BETWEEN :data_inicial AND :data_final";

$params = [
    ':data_inicial' => $data_inicial,
    ':data_final' => $data_final
];
if (!empty($categoria)) {
    $sql .= " AND categoria = :categoria";
    $params[':categoria'] = $categoria;
}
if (!empty($status)) {
    $sql .= " AND status = :status";
    $params[':status'] = $status;
}

$sql .= " ORDER BY " . $ordenar_por;

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($formato == 'pdf') {
    echo "<h2>Relatório em PDF</h2>";
    foreach ($resultados as $linha) {
        echo "Data: " . $linha['data'] . " - Categoria: " . $linha['categoria'] . " - Status: " . $linha['status'] . "<br>";
    }
} elseif ($formato == 'excel') {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="relatorio.xls"');
    echo "Data\tCategoria\tStatus\n";
    foreach ($resultados as $linha) {
        echo $linha['data'] . "\t" . $linha['categoria'] . "\t" . $linha['status'] . "\n";
    }
} elseif ($formato == 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="relatorio.csv"');
    echo "Data,Categoria,Status\n";
    foreach ($resultados as $linha) {
        echo $linha['data'] . "," . $linha['categoria'] . "," . $linha['status'] . "\n";
    }
} else {
    echo "<p>Formato de relatório não suportado.</p>";
}
?>
