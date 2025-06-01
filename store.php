<?php
require_once 'config.php'; // Conexão com PDO

// Pegar os dados enviados pelo formulaŕio via POST, ou NULL se for vazio
$nome = $_POST['nome'] ?? null;
$email = $_POST['email'] ?? null;

// Verifica se os dois valores foram informados
if ($nome && $email) {
    $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)"; // Uso de :nome e :email no SQL permite que o PDO substitua esses marcadores pelos valores reais, de forma segura. Evitando ataque SQL Injection

    // Prepara a query para execução segura com placeholders (bind)
    $stmt = $pdo->prepare($sql);

    // Vincula os valores reais aos placeholders
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);

    // Executa a query no bd
    $stmt->execute();
}

// Redireciona para o index
header("Location: index.php");
exit;
?>
