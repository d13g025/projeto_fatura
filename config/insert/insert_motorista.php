<?php

require_once "../Conexao.php";

$motorista = $_POST['nome'];
$cpf = $_POST['cpf'];

$query = "INSERT INTO motorista (nome, cpf) VALUES (:nome, :cpf)";

// Aqui a gente faz a conexão com o banco de dados usando o método getConnection da classe Conexao (estático).
$conn = Conexao::getConnection();

// prepare quando a gente vai tratar os dados antes de enviar para o banco, para evitar sql injection.
// Já o query é quando a gente vai enviar os dados diretamente para o banco.
$stmt = $conn->prepare($query);

// bindParam é para fazer a ligação dos dados que a gente está tratando com o banco de dados.
// No $query a gente coloca o nome do campo que a gente quer tratar e no bindParam a gente coloca o nome do campo que a gente quer enviar para o banco de dados.
$stmt->bindParam(':nome', $motorista);
$stmt->bindParam(':cpf', $cpf);

try {
    // execute é para executar a query.
    $stmt->execute();
    // header é para redirecionar a página para o local que a gente quer.
    header('Location: ../../cadastro.php');
    // Fecha a conexão
    $conn = Conexao::closeConnection();
} catch (PDOException $e) {
    // Armazena a mensagem de erro em uma variável
    $errorMessage = $e->getMessage();
    // Saída do JavaScript para exibir o alerta
    echo "<script>alert('Erro: " . addslashes($errorMessage) . "'); window.location.href='../../cadastro.php';</script>";
}


?>