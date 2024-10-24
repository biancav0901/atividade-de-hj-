<?php
require 'config.php';

// Função para adicionar um funcionário
function addFuncionario($numero, $salario, $telefone, $departamento_id) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO Funcionario (numero, salario, telefone, departamento_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$numero, $salario, $telefone, $departamento_id]);
}

// Função para listar todos os funcionários
function listFuncionarios() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM Funcionario");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Exemplo de uso das funções
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Adicionando um funcionário com dados enviados pelo formulário
    addFuncionario($_POST['numero'], $_POST['salario'], $_POST['telefone'], $_POST['departamento_id']);
}

// Listando funcionários
$funcionarios = listFuncionarios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários</title>
</head>
<body>

<h1>Cadastro de Funcionários</h1>

<form method="POST">
    <label for="numero">Número:</label>
    <input type="text" name="numero" required>
    
    <label for="salario">Salário:</label>
    <input type="number" name="salario" step="0.01" required>
    
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" required>
    
    <label for="departamento_id">Departamento ID:</label>
    <input type="number" name="departamento_id" required>
    
    <button type="submit">Adicionar Funcionário</button>
</form>

<h2>Funcionários Cadastrados</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Número</th>
        <th>Salário</th>
        <th>Telefone</th>
        <th>Departamento ID</th>
    </tr>
    <?php foreach ($funcionarios as $funcionario): ?>
    <tr>
        <td><?= htmlspecialchars($funcionario['id']) ?></td>
        <td><?= htmlspecialchars($funcionario['numero']) ?></td>
        <td><?= htmlspecialchars($funcionario['salario']) ?></td>
        <td><?= htmlspecialchars($funcionario['telefone']) ?></td>
        <td><?= htmlspecialchars($funcionario['departamento_id']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

