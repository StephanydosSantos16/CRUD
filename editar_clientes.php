<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $cpf = $row['cpf'];
        $endereco = $row['endereço'];
        $telefone = $row['telefone'];
        $email = $row['email'];
    } else {
        echo "Cliente não encontrado.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereço"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    $sql = "UPDATE users SET nome='$nome', cpf='$cpf', endereço='$endereco', telefone='$telefone', email='$email' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar cliente: " . $conn->error;
    }
} else {
    echo "Requisição inválida.";
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="editar_clientes.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="nome" placeholder="Nome" value="<?php echo $nome; ?>" required>
            <input type="text" name="cpf" placeholder="CPF" value="<?php echo $cpf; ?>" required>
            <input type="text" name="endereço" placeholder="Endereço" value="<?php echo $endereco; ?>" required>
            <input type="tel" name="telefone" placeholder="Telefone" value="<?php echo $telefone; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>