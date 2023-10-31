<!DOCTYPE html>
<html>
<head>
    <title>Atualização de Aluno</title>
</head>
<body>
    <h1>Atualização de Aluno</h1>

    <?php
   
    include('conexao.php');

    
    $conn = mysqli_connect('localhost', 'root', '123', 'universidade');

    // Verifique se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $matricula = $_POST['matricula'];
        $novoNome = $_POST['novoNome'];
        $novoEndereco = $_POST['novoEndereco'];
        $novaCidade = $_POST['novaCidade'];

        // Atualize as informações do aluno no banco de dados
        $query = "UPDATE Aluno SET nome = '$novoNome', endereco = '$novoEndereco', cidade = '$novaCidade' WHERE matricula = $matricula";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Informações do aluno atualizadas com sucesso!";
        } else {
            echo "Erro na atualização: " . mysqli_error($conn);
        }
    } else {
        // Se o formulário não foi submetido, exiba os dados atuais do aluno
        $matricula = $_GET['matricula'];
        $query = "SELECT * FROM Aluno WHERE matricula = $matricula";
        $result = mysqli_query($conn, $query);
        $aluno = mysqli_fetch_assoc($result);

        if ($aluno) {
            echo '<form method="POST">';
            echo 'Matrícula: ' . $aluno['matricula'] . '<br>';
            echo 'Nome: <input type="text" name="novoNome" value="' . $aluno['nome'] . '"><br>';
            echo 'Endereço: <input type="text" name="novoEndereco" value="' . $aluno['endereco'] . '"><br>';
            echo 'Cidade: <input type="text" name="novaCidade" value="' . $aluno['cidade'] . '"><br>';
            echo '<input type="hidden" name="matricula" value="' . $matricula . '">';
            echo '<input type="submit" value="Atualizar">';
            echo '</form>';
        } else {
            echo "Aluno não encontrado.";
        }
    }
    ?>

</body>
</html>
