<?php
// Dados de conexão com o banco de dados
$host = "localhost";
$user = "root";
$passwd = "";
$db_name   = "av3";

// Conectando ao banco de dados
$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// Verificando a ação solicitada
$action = $_POST['action'];

switch ($action) {
    case 'Adicionar':
        salvarForm();
        break;
    case 'Apagar':
        excluirForm();
        break;
}

// Função para salvar ou atualizar um cliente
function salvarForm() {
    global $mysqli;

    // Recupera dados do formulário
    $id         = (int) $_POST['id'];
    $nome       = $_POST['nomeProduto'];
    $quant      = $_POST['quant'];
    $preco   = $_POST['preco'];
   
    // Validação dos dados do formulário
    $v = validarForm($nome, $quant, $preco);
    if ($v != null) {
        echo "Problema encontrado:<br>" . $v;
        exit();
    }
        $sql = "INSERT INTO cliente (nome, email, telefone, foto) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssss', $nome, $email, $telefone, $nome_imagem);

    // Executa a query
    if ($stmt->execute()) {
        echo "Produto salvo com sucesso!";
    } else {
        echo "Erro ao salvar produto: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}

// Função para excluir um produto
function excluirForm() {
    global $mysqli;

    // Recupera dados do formulário
    $nome = $_POST['nomeProduto'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quant'];

    // Validação dos dados do formulário
    if (empty($nome) || empty($preco) || empty($quantidade)) {
        echo "Todos os campos (Nome, Preço, Quantidade) devem ser preenchidos.";
        exit();
    }

    // Prepara SQL para excluir o registro
    $sql = "DELETE FROM produto WHERE nome=? AND preco=? AND quantidade=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sdi', $nome, $preco, $quantidade);

    // Executa a query
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Produto excluído com sucesso!";
        } else {
            echo "Nenhum produto encontrado com os critérios fornecidos.";
        }
    } else {
        echo "Erro ao excluir produto: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesNovaSenha.css">
    <title>Entrar</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="capa_formulario.jpg">
        </div>

        <div class="form">
            <form action="#">
                <div class="form-header">
                    <div class="title">
                        <h1>Redefinir Senha</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="AV2_teste.html">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="preco">Nome do produto</label>
                        <input id="nomeProduto" type="text" name="nomeProduto" required>
                    </div>

                    <div class="input-box">
                        <label for="preco">Quantidade</label>
                        <input id="quant" type="text" name="quant" required>
                    </div>
<br>
                    <div class="input-box">
                        <label for="preco">Preço</label>
                        <input id="preco" type="text" name="preco" required>
                    </div>            
                </div>
                <div class="continue-button">
                    <button name="action"><a href="#">Adicionar</a></button>
                </div>
                <div class="continue-button">
                    <button name="action"><a href="#">Apagar</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>