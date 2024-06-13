<?php

require_once '../Conexao.php';

$id_placa = $_GET['id_placa'];

if (isset($id_placa)) {

    $pdo = Conexao::getConnection();
    $sql = "DELETE FROM placas WHERE id_placa = :id_placa";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_placa', $id_placa);

try {

    $stmt->execute();
    $pdo = Conexao::closeConnection();
    //echo "Registro excluído com sucesso!"; teste p ver se deu certo
    header('Location: ../../consulta_placa.php');
}catch (PDOException $e) {
    // Em caso de erro, exibe uma mensagem de erro e redireciona para a página de origem
    echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='../../consulta_placa.php';</script>";
}
}
?>