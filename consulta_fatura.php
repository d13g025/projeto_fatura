<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "./Bootstrap/bootstrap.php" ?>
    <link rel="stylesheet" href="./css/style.css">
    <title>CONSULTA</title>
</head>
<body>
    <div class="row">
        <div class="col-4 div1">
            <?php require './sidebar.php'; ?>
        </div>
        <div class="col border-bottom">
            <div id="content" class="row text-center">
                <div class="col ">
                    <button type="button" class="btn btn-outline-secondary"><a href="consulta_motorista.php">CONSULTA MOTORISTA</a></button>
                    <button type="button" class="btn btn-outline-secondary"><a href="consulta_placa.php">CONSULTA PLACAS</a></button>
                    <button type="button" class="btn btn-outline-secondary"><a href="consulta_transportador.php">CONSULTA TRANSPORTADOR</a></button>
                    <button type="button" class="btn btn-outline-secondary">CONSULTA FATURA</button>
                </div>
            </div>

            <div>
                <h1 class="text-center mt-5">Consulta Fatura</h1>
            </div>

            <div class="row">
                
                <div class="col">
                    <table class="table mt-3">
                        <tr>
                            <th scope="col">Numero_Fatura</th>
                            <th scope="col">Data</th>
                            <th scope="col">Transportador</th>
                            <th scope="col">Motorista</th>
                            <th scope="col">Placa Cavalo</th>
                            <th scope="col">Placa Compartimento</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor Unitario</th>
                            <th scope="col">Total</th>
                        </tr>
                        <tbody>
                            <?php
                            require_once "./config/Conexao.php";
                            $conn = Conexao::getConnection();
                            $sql = "SELECT * FROM fatura_view";
                            $stmt = $conn->query($sql);
                            if ($stmt->rowCount() > 0) {
                                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($linha['id_fatura']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['data_emissao']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['transportador_razao_social']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['motorista_nome']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['placa_cavalo']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['placa_compartimento']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['produto_descricao']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['valor_unitario']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['valor_total']) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Nenhum registro encontrado</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
