<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Professores</title>
</head>
<body>
    <h1>Listagem de Professores</h1>

    <?php
    include('conexao.php');
    $conn = mysqli_connect('localhost', 'root', '123', 'universidade');

    // Consulta para listar os professores
    $query = "SELECT COD_PROF, nome, endereco, cidade FROM Professor";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<table border="1">';
        echo '<tr><th>Código</th><th>Nome</th><th>Endereço</th><th>Cidade</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['COD_PROF'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['endereco'] . '</td>';
            echo '<td>' . $row['cidade'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Erro na consulta: " . mysqli_error($conn);
    }
    ?>

</body>
</html>
