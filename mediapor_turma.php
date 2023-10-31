<!DOCTYPE html>
<html>
<head>
    <title>Média de Notas em Disciplina em um Ano por Turma</title>
</head>
<body>
    <h1>Média de Notas em Disciplina em um Ano por Turma</h1>

    <form method="POST">
        Disciplina:
        <select name="disciplina">
            <option value="BDS222">BDS222</option>
            <option value="POO201">POO201</option>
            <option value="IHC207">IHC207</option>
            <option value="ENG203">ENG203</option>
        </select>
        Ano:
        <input type="text" name="ano">
        <input type="submit" value="Calcular Média por Turma">
    </form>

    <?php
    include('conexao.php');
    $conn = mysqli_connect('localhost', 'root', '123', 'universidade');

    // Verifique se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $disciplina = $_POST['disciplina'];
        $ano = $_POST['ano'];

        // Calcule a média das notas dos alunos nessa disciplina e ano por turma
        $query = "SELECT AVG(nota) AS media, turma.COD_TURMA, turma.COD_DISC
                  FROM Historico
                  INNER JOIN Turma ON Historico.COD_TURMA = Turma.COD_TURMA AND Historico.COD_DISC = Turma.COD_DISC
                  WHERE Turma.COD_DISC = '$disciplina' AND Turma.ANO = $ano
                  GROUP BY turma.COD_TURMA, turma.COD_DISC
                  HAVING media > 5"; // Altere 5 para a média desejada

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<h2>Turmas com média de notas superior à média:</h2>';
            echo '<ul>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li>Turma: ' . $row['COD_TURMA'] . ' - Disciplina: ' . $row['COD_DISC'] . ' (Média: ' . $row['media'] . ')</li>';
            }
            echo '</ul>';
        } else {
            echo "Erro ao calcular a média: " . mysqli_error($conn);
        }
    }
    ?>

</body>
</html>
