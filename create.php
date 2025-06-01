<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 class="titulo">Novo Usuário</h1>
    <div class="form-container">
        <form action="store.php" method="POST" class="formulario"> <!-- Formulário que envia os dados via método POST para o arquivo store.php que vai inserir os dados no BD -->
            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required placeholder="Digite seu Nome">
            </div>
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" name="email" required placeholder="Digite seu melhor E-mail"><br><br>
            </div>
            <div class="campo-botao">
                <button type="submit">Criar</button> <!-- Botão para enviar o formulário -->
            </div>
        </form>
    </div>
    <br>
    <div class="voltar">
        <a href="index.php">Voltar para listagem</a>
    </div>
</body>
</html>
