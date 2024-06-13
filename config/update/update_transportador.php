<?php

require_once '../Conexao.php'; // Ajuste o caminho conforme necessário

if (isset($_POST['id_transportador'], $_POST['nome'], $_POST['cnpj'])) {
    $id_transportador = $_POST['id_transportador'];
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];

    $pdo = Conexao::getConnection();
    $sql = "UPDATE transportador SET razao_social = :nome, cnpj = :cnpj WHERE id_transportador = :id_transportador";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cnpj', $cnpj);
    $stmt->bindParam(':id_transportador', $id_transportador);
    $stmt->execute();

    Conexao::closeConnection();

    // Redirecionar para a página de consulta
    header("Location: ../../consulta_transportador.php");
    exit();
}

?>