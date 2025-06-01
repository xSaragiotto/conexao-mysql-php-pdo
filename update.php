<?php
require_once 'config.php'; // Conexão com o PDO

// Pega os dados do form via POST ou NULL
$id = $_POST['id'] ?? null;
$nome = $_POST['nome'] ?? null;
$email = $_POST['email'] ?? null;

// Verifica se o id, nome e email já foram informados
if ($id && $nome && $email) {

    // Prepara a query SQL para atualizar o usuário com o id informado
    $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";

    // Prepara a query para a execução segura com placeholders
    $stmt = $pdo->prepare($sql);

    // Vincula os valores reais aos placeholders
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
}

// Após atualizar, redireciona o usuário de volta para a página principal (listagem)
header("Location: index.php");
exit;
?>
