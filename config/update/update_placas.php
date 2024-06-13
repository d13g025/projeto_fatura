<?php

require_once '../Conexao.php'; // Ajuste o caminho conforme necessário

if (isset($_POST['id_placa'], $_POST['placa'], $_POST['tipo'])) {
    $id_placa = $_POST['id_placa'];
    $tipo = $_POST['tipo'];
    $placa = $_POST['placa'];

    $pdo = Conexao::getConnection();
    $sql = "UPDATE placas SET placa = :placa, id_tipo = :id_tipo WHERE id_placa = :id_placa";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':id_placa', $id_placa);
    $stmt->bindParam(':id_tipo', $tipo);
    $stmt->execute();

    Conexao::closeConnection();

    // Redirecionar para a página de consulta
    header("Location: ../../consulta_placa.php");
    exit();
}

?>