<?php
// Dados de conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$bd_name  = "av3";

// Conectando ao banco de dados
$mysqli = new mysqli($host, $user, $pass, $bd_name);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

    // Recupera dados do formulário
    $email = $_POST['email'];
    $novaSenha = $_POST['passwd'];

    // Validação dos dados do formulário
    if (empty($email) || empty($novaSenha)) {
        echo "Todos os campos (Email e Nova Senha) devem ser preenchidos.";
        exit();
    }

    // Prepara SQL para atualizar a senha
    $sql = "UPDATE usuarios SET senha=? WHERE email=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $novaSenha, $email);

    // Executa a query
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Senha atualizada com sucesso!";
        } else {
            echo "Nenhum usuário encontrado com o email fornecido.";
        }
    } else {
        echo "Erro ao atualizar a senha: " . $stmt->error;
    }

    $stmt->close();

$mysqli->close();
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
                        <button><a href="Cadastrar.html">Cadastrar-se</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" required>
                    </div>
<br>
                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Confirme sua nova senha</label>
                        <input id="password" type="password" name="password" required>
                    </div>                
                </div>
                <div class="continue-button">
                    <button><a href="#">Entrar</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>