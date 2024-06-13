<?php

require_once '../Conexao.php';

$id_transportador = $_GET['id_transportador'];

if (isset($id_transportador)) {
    $pdo = Conexao::getConnection();
    $sql = "DELETE FROM transportador WHERE id_transportador = :id_transportador";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_transportador', $id_transportador);

try{$stmt->execute();
    $pdo = Conexao::closeConnection();
    //echo "Registro excluído com sucesso!"; teste p ver se deu certo
    header('Location: ../../consulta_transportador.php');

}catch (PDOException $e) {
    // Em caso de erro, exibe uma mensagem de erro e redireciona para a página de origem
    echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='../../consulta_transportador.php';</script>";
}
}
?>