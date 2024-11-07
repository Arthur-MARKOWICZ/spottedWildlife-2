<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Filtros para Geração de Relatório</title>
</head>
<body>
    <h1>Filtros para Geração de Relatório</h1>
    <form action="gerar_relatorio.php" method="POST">
        <label for="data_inicial">Data Inicial:</label>
        <input type="date" id="data_inicial" name="data_inicial" required>

        <label for="data_final">Data Final:</label>
        <input type="date" id="data_final" name="data_final" required>

        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria">
            <option value="">Selecione</option>
            <option value="categoria1">Categoria 1</option>
            <option value="categoria2">Categoria 2</option>
            <!-- Adicione mais categorias conforme necessário -->
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="">Selecione</option>
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
            <!-- Adicione mais status conforme necessário -->
        </select>

        <label for="ordenar_por">Ordenar Por:</label>
        <select id="ordenar_por" name="ordenar_por">
            <option value="data">Data</option>
            <option value="categoria">Categoria</option>
            <option value="status">Status</option>
        </select>

        <label for="agrupar_por">Agrupar Por:</label>
        <select id="agrupar_por" name="agrupar_por">
            <option value="nenhum">Nenhum</option>
            <option value="categoria">Categoria</option>
            <option value="status">Status</option>
        </select>

        <label for="formato">Formato do Relatório:</label>
        <select id="formato" name="formato">
            <option value="pdf">PDF</option>
            <option value="excel">Excel</option>
            <option value="csv">CSV</option>
        </select>

        <button type="submit">Gerar Relatório</button>
        <button type="reset">Limpar Filtros</button>
    </form>
</body>
</html>
