<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Histórico</title>
</head>
<body>
    <h1>Cadastro de Histórico</h1>
    <form method="post" action="processar_cadastro_historico.php">
        Matrícula do Aluno: <input type="text" name="matricula"><br>
        Código da Disciplina: <input type="text" name="cod_disc"><br>
        Código da Turma: <input type="text" name="cod_turma"><br>
        Código do Professor: <input type="text" name="cod_prof"><br>
        Ano: <input type="text" name="ano"><br>
        Frequência: <input type="text" name="frequencia"><br>
        Nota: <input type="text" name="nota"><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>

<?php
include('conexao.php');

// Receba os dados do formulario
$matricula = $_POST["matricula"];
$cod_disc = $_POST["cod_disc"];
$cod_turma = $_POST["cod_turma"];
$cod_prof = $_POST["cod_prof"];
$ano = $_POST["ano"];
$frequencia = $_POST["frequencia"];
$nota = $_POST["nota"];

// Execute a consulta SQL para inserir o registro no histórico
$query = "INSERT INTO historico (matricula, COD_DISC, COD_TURMA, COD_PROF, ANO, frequencia, nota) 
          VALUES ('$matricula', '$cod_disc', '$cod_turma', '$cod_prof', '$ano', '$frequencia', '$nota')";
if ($mysqli->query($query) === TRUE) {
    echo "Histórico cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar histórico: " . $mysqli->error;
}

$mysqli->close();
?>
