<?php

require_once '../Conexao.php';

if (isset($_GET['id_fatura'])) {
    $id_fatura = $_GET['id_fatura'];

    $conn = Conexao::getConnection();
    $sql = "SELECT * FROM fatura_view";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_fatura', $id_fatura);
    $stmt->execute();
    $fatura = $stmt->fetch(PDO::FETCH_ASSOC);

    Conexao::closeConnection();
}



?>