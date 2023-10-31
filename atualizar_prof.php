<!DOCTYPE html>
<html>
<head>
    <title>Atualização de Professor</title>
</head>
<body>
    <h1>Atualização de Professor</h1>

    <?php
    include('conexao.php');
    
    $conn = mysqli_connect('localhost', 'rooto', '123', 'universidade');

    // Verifique se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];

        // Atualize as informações do professor no banco de dados
        $query = "UPDATE Professor SET nome = '$nome', endereco = '$endereco', cidade = '$cidade' WHERE COD_PROF = $codigo";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Professor atualizado com sucesso!";
        } else {
            echo "Erro na atualização: " . mysqli_error($conn);
        }
    }
    ?>

    <form method="POST">
        Código do Professor a ser atualizado:
        <input type="text" name="codigo">
        <br>
        Novo Nome:
        <input type="text" name="nome">
        <br>
        Novo Endereço:
        <input type="text" name="endereco">
        <br>
        Nova Cidade:
        <input type="text" name="cidade">
        <br>
        <input type="submit" value="Atualizar Professor">
    </form>

</body>
</html>
