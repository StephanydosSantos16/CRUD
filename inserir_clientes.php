<?php
include 'conexao.php';

// Recebendo os dados do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereço']; // Corrigido para corresponder ao nome da coluna na tabela do banco de dados
$telefone = $_POST['telefone'];
$email = $_POST['email'];

// Inserindo os dados no banco de dados
$sql = "INSERT INTO users (nome, cpf, endereço, telefone, email) VALUES ('$nome', '$cpf', '$endereco', '$telefone', '$email')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php"); // Redirecionar de volta para o index após o cadastro
    exit(); // Encerrar o script após o redirecionamento
} else {
    echo "Erro ao cadastrar cliente: " . $conn->error;
}

$conn->close();
?>