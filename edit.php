<?php
// Conexão PDO
require_once 'config.php';

// Pega o parâmetro 'id' da URL via POST, ou NULL
$id = $_GET['id'] ?? null;

// Se não receber o id, redireciona para a lista de usuários
if(!$id) {
    header("Location: index.php");
    exit;
}

// Prepara a query para buscar o usuário pelo ID
$sql = "SELECT * FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);

// Associa o parâmetro id com o valor recebido (tipo inteiro)
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

// Busca os dados do usuário como array assoc.
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Caso o valor não seja encontrado redireciona para a lista
if(!$usuario) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="container">
        <h1 class="titulo-principal">Editar Usuário</h1>
        <form class="form-edit" action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>"> <!-- Campo que oculta o id do usuário ao enviar -->
            <div class="campo-form">
                <label for="nome" class="label">Novo Nome:</label><br>
                <input class="input-text" id="nome" type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required placeholder="Digite o novo Nome:"> <!-- Campo já preenchido com o valor atual -->
            </div>
            <div class="campo-form">
                <Label for="email" class="label">Novo E-Mail:</Label><br>
                <input class="input-text" id="email" type="text" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required placeholder="Digite o novo E-Mail:">
            </div>
            <div class="campo-form">
                <button type="submit" class="btn-primary">Atualizar</button>
            </div>
        </form>
        <div class="voltar">
            <a href="index.php" class="link=voltar">Voltar para Listagem</a>
        </div>
    </main>
</body>
</html>
