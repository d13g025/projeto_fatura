<?php

require_once '../Conexao.php'; // Ajuste o caminho conforme necessário

if (isset($_POST['id_motorista'], $_POST['nome'], $_POST['cpf'])) {
    $id_motorista = $_POST['id_motorista'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    $pdo = Conexao::getConnection();
    $sql = "UPDATE motorista SET nome = :nome, cpf = :cpf WHERE id_motorista = :id_motorista";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':id_motorista', $id_motorista);
    $stmt->execute();

    Conexao::closeConnection();

    // Redirecionar para a página de consulta
    header("Location: ../../consulta_motorista.php");
    exit();
}
?>
