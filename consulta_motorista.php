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
                <h1 class="text-center mt-5">Consulta Motorista</h1>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <table class="table mt-3">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col" colspan="1">OPÇÕES</th>
                        </tr>
                        <tbody>
                            <?php
                            require_once "./config/Conexao.php";
                            $conn = Conexao::getConnection();
                            $sql = "SELECT * FROM motorista";
                            $stmt = $conn->query($sql);
                            if ($stmt->rowCount() > 0) {
                                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($linha['id_motorista']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['cpf']) . "</td>";
                                    ?>
                                    <td>
                                        <a href="./config/select/select_motorista.php?id_motorista=<?php echo $linha['id_motorista']; ?>" class="btn btn-primary">
                                            Editar
                                        </a>
                                        <a href="./config/delete/delete_motorista.php?id_motorista=<?php echo $linha['id_motorista']; ?>" class="btn btn-danger">
                                            Excluir
                                        </a></td>
                                    <?php
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>Nenhum registro encontrado</td></tr>";
                            }
                            $conn = Conexao::closeConnection();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

</body>
</html>
