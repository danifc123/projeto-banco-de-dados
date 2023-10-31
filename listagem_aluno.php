<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Alunos por Cidade</title>
</head>
<body>
    <h1>Listagem de Alunos por Cidade</h1>

    <?php
    include('conexao.php');
    
    $conn = mysqli_connect('localhost', 'root', '123', 'universidade');

    // Consulta para listar os alunos por cidade
    $query = "SELECT cidade, nome FROM Aluno";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Crie um array para armazenar os alunos por cidade
        $alunosPorCidade = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $cidade = $row['cidade'];
            $nome = $row['nome'];

            // Adicione o aluno à cidade correspondente no array
            if (!isset($alunosPorCidade[$cidade])) {
                $alunosPorCidade[$cidade] = array();
            }

            $alunosPorCidade[$cidade][] = $nome;
        }

        // Exiba a lista de alunos por cidade
        foreach ($alunosPorCidade as $cidade => $alunos) {
            echo '<h2>' . $cidade . '</h2>';
            echo '<ul>';
            foreach ($alunos as $aluno) {
                echo '<li>' . $aluno . '</li>';
            }
            echo '</ul>';
            echo 'Total de alunos em ' . $cidade . ': ' . count($alunos);
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($conn);
    }
    ?>

</body>
</html>
