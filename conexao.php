<?php
$host = "localhost"; 
$usuario = "root";
$senha = "123"; 
$banco = "universidade"; 
// Cria uma conexão com o MySQL
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifique se ocorreu um erro na conexão
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
