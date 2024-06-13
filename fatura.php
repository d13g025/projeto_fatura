<?php
session_start();

if (!isset($_SESSION['login'])) {
    // Se a sessão não estiver iniciada (usuário não logado)
    header('Location: login.php');
    exit;
}

include_once './config/Conexao.php'; // Inclui o arquivo de conexão
?>
<?php
require_once './config/Conexao.php';

// Abre a conexão com o banco de dados
$conn = Conexao::getConnection();

// Consulta SQL para obter o ID da última fatura
$query = "SELECT id_fatura FROM fatura ORDER BY id_fatura DESC LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->execute();
$lastFatura = $stmt->fetch(PDO::FETCH_ASSOC);

// Calcula o próximo número da fatura incrementando o ID da última fatura em 1
$nextFatura = $lastFatura['id_fatura'] + 1;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "./Bootstrap/bootstrap.php" ?>
    <link rel="stylesheet" href="./css/style.css">
    <title>FATURAMENTO</title>
    <script>
        function calcularTotal() {
            var volume = document.getElementsByName('volume')[0].value;
            var unitPrice = document.getElementsByName('preco_unit')[0].value;
            var total = volume * unitPrice;
            document.getElementById('total').value = total.toFixed(2);
        }
    </script>
</head>

<body>
    <div class="row">
        <div class="col-4 div1">
            <?php require 'sidebar.php'; ?>
        </div>
        <div class="col border-bottom">
            <div class="row mt-5 pt-3 border-top" style="height: 5rem;">
                <h2 class="text-center">Emissão de Fatura - Falta de Produto</h2>
            </div>
            <div id="content" class="text-center">
                <div class="container">

                    <form action="./config/insert/insert_fatura.php" method="POST">
                        <!-- CAMPO NUMERO DA FATURA -->
                        <div class="row">
                            <div class="col"></div>
                            <div class="col mb-3 mt-1">
                                <label class="form-label me-5">Número da Fatura</label>
                                <input type="text" class="form-control w-25 ms-5" id="numero_fatura" placeholder="Número da Fatura" value="<?php echo $nextFatura; ?>" readonly>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Data</label>
                                <input type="date" class="form-control" id="data_emissao" name="data_emissao">
                            </div>
                            <div class="col"></div>
                        </div>

                        <hr>
                        <!-- CAMPO PARA DADOS DO MOTORISTA E PLACAS -->
                        <div class="row mt-3">
                            <div class="col-3 mb-3">
                                <label class="form-label">Transportador: </label>
                                <select class="form-select" aria-label="Default select example" name="transportador" id="transportador">
                                    <?php
                                    $pdo = Conexao::getConnection();
                                    $sql = "SELECT * FROM transportador";
                                    $stmt = $pdo->query($sql);
                                    if ($stmt->rowCount() > 0) {
                                        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $linha['id_transportador'] . "'>" . $linha['razao_social'] . "</option>";
                                        }
                                    }
                                    $pdo = null; // Fechar a conexão
                                    ?>
                                </select>
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Motorista:</label>
                                <select class="form-select" aria-label="Default select example" name="motorista" id="motorista">
                                    <?php
                                    $pdo = Conexao::getConnection();
                                    $sql = "SELECT * FROM motorista";
                                    $stmt = $pdo->query($sql);
                                    if ($stmt->rowCount() > 0) {
                                        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $linha['id_motorista'] . "'>" . $linha['nome'] . "</option>";
                                        }
                                    }
                                    $pdo = null; // Fechar a conexão
                                    ?>
                                </select>
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Placa Cavalo:</label>
                                <select class="form-select" aria-label="Default select example" name="placa_cavalo" id="placa_cavalo">
                                    <?php
                                    $pdo = Conexao::getConnection();
                                    $sql = "SELECT placas.id_placa, placas.placa, tipo.tipo FROM placas INNER JOIN tipo ON placas.id_tipo = tipo.id_tipo WHERE placas.id_tipo = 1";
                                    $stmt = $pdo->query($sql);
                                    if ($stmt->rowCount() > 0) {
                                        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $linha['id_placa'] . "'>" . $linha['placa'] . "</option>";
                                        }
                                    }
                                    $pdo = null; // Fechar a conexão
                                    ?>
                                </select>
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Placa Compartimento: </label>
                                <select class="form-select" aria-label="Default select example" name="placa_compartimento" id="placa_compartimento">
                                    <?php
                                    $pdo = Conexao::getConnection();
                                    $sql = "SELECT placas.id_placa, placas.placa, tipo.tipo FROM placas INNER JOIN tipo ON placas.id_tipo = tipo.id_tipo WHERE placas.id_tipo = 2";
                                    $stmt = $pdo->query($sql);
                                    if ($stmt->rowCount() > 0) {
                                        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $linha['id_placa'] . "'>" . $linha['placa'] . "</option>";
                                        }
                                    }
                                    $pdo = null; // Fechar a conexão
                                    ?>
                                </select>
                            </div>
                        </div>

                        <hr>
                        <!-- CAMPO PARA DADOS DO PRODUTO -->
                        <div class="row mt-3">
                            <div class="col mb-3">
                                <label for="product" class="form-label">Produto</label>
                                <select class="form-select" aria-label="Default select example" name="produto">
                                    <?php
                                    $pdo = Conexao::getConnection();
                                    $sql = "SELECT * FROM produto";
                                    $stmt = $pdo->query($sql);
                                    if ($stmt->rowCount() > 0) {
                                        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $linha['id_produto'] . "'>" . $linha['descricao_produto'] . "</option>";
                                        }
                                    }
                                    $pdo = null; // Fechar a conexão
                                    ?>
                                </select>
                            </div>

                            <div class="col mb-3">
                                <label for="volume" class="form-label">Volume</label>
                                <input type="number" class="form-control" name="volume" placeholder="Digite o volume" oninput="calcularTotal()">
                            </div>
                            <div class="col mb-3">
                                <label for="unitPrice" class="form-label">Valor Unitário</label>
                                <input type="number" class="form-control" name="preco_unit" placeholder="Digite o valor unitário" step="0.000001" oninput="calcularTotal()">
                            </div>
                            <div class="col mb-3">
                                <label for="total" class="form-label">Total</label>
                                <input type="number" class="form-control" name="total" id="total" placeholder="Digite o valor total" step="0.01" readonly>
                            </div>
                        </div>

                        <div class="mt-5">
                            <input class="btn btn-primary" type="submit" value="Cadastrar">
                            <input class="ms-3 btn btn-danger" type="reset" value="Cancelar">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>



