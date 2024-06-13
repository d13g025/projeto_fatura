<?php
require_once '../Conexao.php';


$data_emissao = $_POST['data_emissao'];
$id_transportador = $_POST['transportador'];
$id_motorista = $_POST['motorista'];
$id_placa_cavalo = $_POST['placa_cavalo'];
$placa_compartimento = $_POST['placa_compartimento'];
$produto = $_POST['produto'];
$volume = $_POST['volume'];
$preco = $_POST['preco_unit'];
$total = $volume * $preco;

// Abre a conexão com o banco de dados
$conn = Conexao::getConnection();

// Prepara a consulta SQL
$query = "INSERT INTO fatura (data_emissao, 
                                id_transportador, 
                                id_motorista, 
                                id_placa_cavalo, 
                                id_placa_compartimento, 
                                id_produto, 
                                volume, 
                                valor_unitario, 
                                valor_total) 
                VALUES (:data_emissao, 
                        :id_transportador, 
                        :id_motorista, 
                        :id_placa_cavalo, 
                        :id_placa_compartimento, 
                        :id_produto, 
                        :volume, 
                        :preco, 
                        :total)";

$stmt = $conn->prepare($query);

// Vincula os valores aos placeholders
$stmt->bindParam(':data_emissao', $data_emissao);
$stmt->bindParam(':id_transportador', $id_transportador);
$stmt->bindParam(':id_motorista', $id_motorista);
$stmt->bindParam(':id_placa_cavalo', $id_placa_cavalo);
$stmt->bindParam(':id_placa_compartimento', $placa_compartimento);
$stmt->bindParam(':id_produto', $produto);
$stmt->bindParam(':volume', $volume);
$stmt->bindParam(':preco', $preco);
$stmt->bindParam(':total', $total);


try {
    // Executa a consulta
    $stmt->execute();
    // Redireciona para a página de sucesso após a inserção
    header('Location: ../../fatura.php');
    // Encerra o script após o redirecionamento
    // Fecha a conexão
    $conn = Conexao::closeConnection();
} catch (PDOException $e) {
    // Em caso de erro, exibe uma mensagem de erro e redireciona para a página de origem
    echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='../../fatura.php';</script>";
}

?>