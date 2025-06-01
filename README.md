
# 📋 Sistema de Cadastro de Usuários (PHP com PDO + MySQL) - CRUD

Este projeto é um sistema simples de cadastro e gerenciamento de usuários para portfólio e estudos pessoais, utilizando PHP com PDO, MySQL. Ele permite criar, listar, editar e excluir registros de usuários de forma dinâmica.

O projeto é ideal para iniciantes em desenvolvimento web backend que desejam entender os fundamentos do CRUD (Create, Read, Update, Delete) e como conectar uma aplicação PHP a um banco de dados MySQL (foi optado por não realizar a conexão mysqli_connect (conn), pois o projeto será reutilizado em outros BD). Também é útil como base para projetos maiores ou como material de estudo para portfólio.

---

## ⚙️ Tecnologias Utilizadas

![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue) 
![PDO](https://img.shields.io/badge/PDO-Supported-green)
![HTML5](https://img.shields.io/badge/HTML5-orange)
![CSS3](https://img.shields.io/badge/CSS3-blue)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-blue)
![Linux Ubuntu](https://img.shields.io/badge/Linux-Ubuntu-orange?logo=ubuntu)
![VSCode](https://img.shields.io/badge/VSCode-Editor-blue?logo=visual-studio-code)
![MySQL Workbench](https://img.shields.io/badge/MySQL_Workbench-tool-blueviolet)

---

## 🚀 Como Usar

1. Clone o repositório:

git clone https://github.com/seu-usuario/seu-repositorio.git

2. Crie o banco de dados:

No MySQL, execute:

CREATE DATABASE sistema_usuarios;

USE sistema_usuarios;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL
);

3. Configure a conexão no arquivo config.php:
$host = 'localhost';

// Define o nome do bancod e dados que será acessado
$dbname = 'usuarios';

// Define o nome de usuario do banco de dados (por padrão é root no xamp)
$user = 'root';

// Define a senha do usuario (pode ser vazia ou senha definida)
$pass = 'senha-do-banco';

<?php
$pdo = new PDO("mysql:host=localhost;dbname=usuarios", "root", "");
?>

4. Rode em um servidor local (XAMPP, WAMP ou similar).
- Rode pelo PHP via terminal do VSCode (php -S localhost:8000)

- Acesse via navegador:
  http://localhost/seu-projeto/

---

## 💡 Funcionalidades

- Buscar usuários por nome
- Cadastrar novo usuário
- Editar dados do usuário
- Excluir usuário com confirmação
- Listar todos os usuários cadastrados

---

## 📌 Melhorias Futuras

- Paginação de usuários
- Sistema de login (autenticação)
- Validação mais robusta
- Tema responsivo e modo escuro
- Integração com Banco de Dados NoSQL
- Containerização com Docker: PHP + SQL/NoSQL
---
