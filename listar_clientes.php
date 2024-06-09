<?php
// Aqui você pode incluir o arquivo de conexão com o banco de dados, se necessário

// Simulação de dados de clientes para teste
$clientes = array(
    array("id" => 1, "nome" => "Cliente 1", "cpf" => "123.456.789-00", "endereço" => "Rua A", "telefone" => "123456789", "email" => "cliente1@example.com"),
    array("id" => 2, "nome" => "Cliente 2", "cpf" => "987.654.321-00", "endereço" => "Rua B", "telefone" => "987654321", "email" => "cliente2@example.com"),
);

// Exibir a lista de clientes
echo "<h2>Clientes Cadastrados</h2>";
echo "<ul>";
foreach ($clientes as $cliente) {
    echo "<li>";
    echo "<strong>ID:</strong> " . $cliente['id'] . "<br>";
    echo "<strong>Nome:</strong> " . $cliente['nome'] . "<br>";
    echo "<strong>CPF:</strong> " . $cliente['cpf'] . "<br>";
    echo "<strong>Endereço:</strong> " . $cliente['endereço'] . "<br>";
    echo "<strong>Telefone:</strong> " . $cliente['telefone'] . "<br>";
    echo "<strong>Email:</strong> " . $cliente['email'] . "<br>";
    // Adicione os links de edição e exclusão
    echo "<a href='editar_clientes.php?id=" . $cliente['id'] . "'>Editar</a> | ";
    echo "<a href='excluir_clientes.php?id=" . $cliente['id'] . "'>Excluir</a>";
    echo "</li>";
}
echo "</ul>";
?>