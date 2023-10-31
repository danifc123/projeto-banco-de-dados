<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Aluno</title>
</head>
<body>
    <h1>Cadastro de Aluno</h1>
    <form method="post" action="processar_cadastro_aluno.php">
        Matrícula: <input type="text" name="matricula"><br>
        Nome: <input type="text" name="nome"><br>
        Endereço: <input type="text" name="endereco"><br>
        Cidade: <input type="text" name="cidade"><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>

<?php
include('conexao.php');
// Conecte-se ao banco de dados
$mysqli = new mysqli("localhost", "root", "123", "universidade");

// Verifique a conexão
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Receba os dados do formulário
$matricula = $_POST["matricula"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];

// Execute a consulta SQL para inserir o aluno
$query = "INSERT INTO aluno (matricula, nome, endereco, cidade) VALUES ('$matricula', '$nome', '$endereco', '$cidade')";
if ($mysqli->query($query) === TRUE) {
    echo "Aluno cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar aluno: " . $mysqli->error;
}

$mysqli->close();
?>
