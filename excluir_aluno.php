<!DOCTYPE html>
<html>
<head>
    <title>Exclusão de Aluno</title>
</head>
<body>
    <h1>Exclusão de Aluno</h1>

    <?php
   include('conexao.php');
   
    $conn = mysqli_connect('localhost', 'root', '123', 'universidade');

    // Verifique se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $matricula = $_POST['matricula'];

        // Exclua o aluno do banco de dados
        $query = "DELETE FROM Aluno WHERE matricula = $matricula";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Aluno excluído com sucesso!";
        } else {
            echo "Erro na exclusão: " . mysqli_error($conn);
        }
    } else {
        // Se o formulário não foi submetido, exiba os detalhes do aluno
        $matricula = $_GET['matricula'];
        $query = "SELECT * FROM Aluno WHERE matricula = $matricula";
        $result = mysqli_query($conn, $query);
        $aluno = mysqli_fetch_assoc($result);

        if ($aluno) {
            echo "Você tem certeza de que deseja excluir o aluno abaixo?<br>";
            echo "Matrícula: " . $aluno['matricula'] . "<br>";
            echo "Nome: " . $aluno['nome'] . "<br>";
            echo "Endereço: " . $aluno['endereco'] . "<br>";
            echo "Cidade: " . $aluno['cidade'] . "<br>";
            echo '<form method="POST">';
            echo '<input type="hidden" name="matricula" value="' . $matricula . '">';
            echo '<input type="submit" value="Confirmar Exclusão">';
            echo '</form>';
        } else {
            echo "Aluno não encontrado.";
        }
    }
    ?>

</body>
</html>
