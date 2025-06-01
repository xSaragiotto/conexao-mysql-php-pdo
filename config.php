<?php
// Arquivo: conexao.php

// Define o endereço do servidor do banco de dados (normalmente localhost para os bancos locais)
$host = 'localhost';

// Define o nome do bancod e dados que será acessado
$dbname = 'usuarios';

// Define o nome de usuario do banco de dados (por padrão é root no xamp)
$user = 'root';

// Define a senha do usuario (pode ser vazia ou senha definida)
$pass = 'senha-do-banco';

try {
    // Cria uma conexão PDO com os parametros fornecidos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);

    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Conexão bem sucedida
   // echo "Conectado com Sucesso!";
} catch (PDOException $e) {
    // Caso a conexão falhe, essa parte será executada

    // Exibe a mensagem de erro capturada pelo modo de erro ERRMODE_EXCEPTION do PDO
    echo "Erro na conexão: " . $e->getMessage();

    // Encerra o script imediatamente após o erro
    exit;
}
?>
