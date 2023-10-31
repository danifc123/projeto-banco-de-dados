<!DOCTYPE html>
<html>
<head>
    <title>Exclusão de Professor</title>
</head>
<body>
    <h1>Exclusão de Professor</h1>

    <?php
    include('conexao.php');

    $conn = mysqli_connect('localhost', 'root', '123', 'universidade');

    // Verifique se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $codigo = $_POST['codigo'];

        // Consulta para verificar se o professor existe
        $checkQuery = "SELECT COUNT(*) AS count FROM Professor WHERE COD_PROF = $codigo";
        $checkResult = mysqli_query($conn, $checkQuery);
        $checkRow = mysqli_fetch_assoc($checkResult);
        $count = $checkRow['count'];

        if ($count > 0) {
            // O professor existe, agora excluir
            $deleteQuery = "DELETE FROM Professor WHERE COD_PROF = $codigo";
            $deleteResult = mysqli_query($conn, $deleteQuery);

            if ($deleteResult) {
                echo "Professor excluído com sucesso!";
            } else {
                echo "Erro na exclusão: " . mysqli_error($conn);
            }
        } else {
            echo "Professor não encontrado. Verifique o código do professor.";
        }
    }
    ?>

    <form method="POST">
        Código do Professor a ser excluído:
        <input type="text" name="codigo">
        <br>
        <input type="submit" value="Excluir Professor">
    </form>

</body>
</html>
