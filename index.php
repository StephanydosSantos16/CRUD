<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Clientes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Clientes</h1>

        <!-- Adicionar cliente -->
        <div class="form-container">
            <h2>Adicionar Cliente</h2>
            <form id="formCliente" action="inserir_clientes.php" method="POST">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="text" name="cpf" placeholder="CPF" oninput="formatarCPF(this)" required>
                <input type="text" name="endereco" placeholder="Endereço" required>
                <input type="tel" name="telefone" placeholder="Telefone" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <!-- Lista de clientes -->
        <div class="clientes-lista">
            <h2>Clientes Cadastrados</h2>
            <ul id="listaClientes">
                <?php
                include 'conexao.php';
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li id='cliente_" . $row["id"] . "'>" . $row["nome"]. " - " . $row["cpf"]. " - " . $row["endereço"]. " - " . $row["telefone"]. " - " . $row["email"]. "
                        <button onclick='editarCliente(" . $row["id"] . ")'>Editar</button>
                        <button onclick='excluirCliente(" . $row["id"] . ")'>Excluir</button>
                        </li>";
                    }
                } else {
                    echo "0 resultados";
                }
                $conn->close();
                ?>
            </ul>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        function editarCliente(id) {
            const cliente = document.getElementById('cliente_' + id);
            const campos = cliente.innerText.split(' - ');

            // Preencher formulário com os dados atuais do cliente
            document.getElementsByName('nome')[0].value = campos[0];
            document.getElementsByName('cpf')[0].value = campos[1];
            document.getElementsByName('endereco')[0].value = campos[2];
            document.getElementsByName('telefone')[0].value = campos[3];
            document.getElementsByName('email')[0].value = campos[4];

            // Mudar o formulário para modo de edição
            document.getElementById('formCliente').setAttribute('action', 'editar_clientes.php');
            document.getElementById('formCliente').innerHTML += "<input type='hidden' name='id' value='" + id + "'><button type='button' onclick='salvarEdicao()'>Salvar</button>";
        }

        function salvarEdicao() {
            document.getElementById('formCliente').submit();
        }

        function excluirCliente(id) {
            if (confirm('Tem certeza que deseja excluir este cliente?')) {
                window.location.href = 'excluir_clientes.php?id=' + id;
            }
        }
    </script>
</body>
</html>