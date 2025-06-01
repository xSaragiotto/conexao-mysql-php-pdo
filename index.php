<?php
require_once 'config.php';

$busca = $_POST['busca'] ?? '';
$pagina = $_GET['pagina'] ?? 1;
$limite = 10;
$offset = ($pagina - 1) * $limite;

// Total de registros (com filtro)
$sqlTotal = "SELECT COUNT(*) as total FROM usuarios WHERE nome LIKE :busca";
$stmtTotal = $pdo->prepare($sqlTotal);
$stmtTotal->bindValue(':busca', "%$busca%", PDO::PARAM_STR);
$stmtTotal->execute();
$total = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];

$totalPaginas = ceil($total / $limite);

// Consulta com paginação
$sql = "SELECT * FROM usuarios WHERE nome LIKE :busca ORDER BY id DESC LIMIT :limite OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':busca', "%$busca%", PDO::PARAM_STR);
$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="styles.css"> <!-- Referencia ao arquivo de estilo -->
</head>
<body>
    <h1>Usuários</h1>
    <form method="POST" action="index.php" class="form-busca"> <!-- Buscar usuário pelo nome -->
        <input type="text" name="busca" placeholder="Buscar por nome:" value="<?= htmlspecialchars($busca, ENT_QUOTES) ?>"/>
        <button type="submit">Buscar</button>
        <a href="index.php">Limpar Busca</a>
    </form>
    <div class="adicionar-usuario">
        <a href="create.php">Adicionar um novo Usuário</a> <!-- Link para página de novo usuário -->
    </div>
    <table class="tabela-usuario"> <!-- Tabela com borda, espaçamento entre cell (mudar depois) -->
        <thead>
            <tr> <!-- Cabeçalho tabela -->
                <th>ID</th>
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario): ?> <!-- loop PHP para percorrer cada usuario retornado do BD -->
                <tr>
                    <td><?= htmlspecialchars($usuario['id']) ?></td> <!-- Cada dado é tratado para evitar injeção HTML/XSS attack -->
                    <td><?= htmlspecialchars($usuario['nome']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                        <td>
                        <a href="edit.php?id=<?= $usuario['id'] ?>" onclick="return confirm('Editar este Usuário: <?= htmlspecialchars($usuario['nome'], ENT_QUOTES) ?>?')">Editar</a> | <!-- Link para editar o usuário, passando od ID na URL -->
                        <form action="delete.php" method="POST" style="display:inline;" onsubmit="return confirm('Excluir este Usuário: <?= htmlspecialchars($usuario['nome'], ENT_QUOTES) ?>?')">
                            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                            <button type="submit" class="btn-link">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginacao">
    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <a href="?pagina=<?= $i ?>" class="<?= ($i == $pagina) ? 'pagina-ativa' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
</body>
</html>
