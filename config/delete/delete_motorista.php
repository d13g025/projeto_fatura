<?php

require_once '../Conexao.php';

$id_motorista = $_GET['id_motorista'];

if (isset($id_motorista)) {
    $pdo = Conexao::getConnection();
    $sql = "DELETE FROM motorista WHERE id_motorista = :id_motorista";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_motorista', $id_motorista);

 try {

    $stmt->execute();
    $pdo = Conexao::closeConnection();
    //echo "Registro excluído com sucesso!"; teste p ver se deu certo
    header('Location: ../../consulta_motorista.php');
 }catch (PDOException $e) {
    // Em caso de erro, exibe uma mensagem de erro e redireciona para a página de origem
    echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='../../consulta_motorista.php';</script>";
}
}

?>