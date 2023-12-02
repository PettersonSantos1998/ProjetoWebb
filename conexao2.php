<?php

session_start();

$localhost = "localhost"; // servidor do banco de dados
$user = "root";
$senha = "";
$banco = "usuario";

// Criar conexão
$conecta = mysqli_connect($localhost, $user,$senha, $banco);

// Verificar a conexão
if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error);
}

// Obter dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : ''; // Criptografar a senha


// Inserir dados no banco de dados
$sql = "INSERT INTO usuarios2 (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if ($conecta->query($sql) === TRUE) {
    echo "Registro inserido com sucesso";
} else {
    echo "Erro ao inserir registro: " . $conecta->error;
}

// Fechar a conexão
$conecta->close();
?>
