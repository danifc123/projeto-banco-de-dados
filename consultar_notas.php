<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Notas</title>
</head>
<body>
    <h1>Alunos com Nota em BANCO DE DADOS em 2020 Menor que 5</h1>
    <?php
    include('conexao.php');
    

    // Execute a consulta SQL para recuperar os alunos
    $query = "SELECT matricula, nome FROM aluno
              WHERE matricula IN (SELECT matricula FROM historico
                                  WHERE COD_DISC = 'BDS222' AND ANO = 2020 AND nota < 5)";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>Matrícula: " . $row["matricula"] . ", Nome: " . $row["nome"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum aluno encontrado com esses critérios.";
    }

    $mysqli->close();
    ?>
</body>
</html>
