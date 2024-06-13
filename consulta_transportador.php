<?php
session_start();

if (!isset($_SESSION['login'])) {
    // Se a sessão não estiver iniciada (usuário não logado)
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
                <h1 class="text-center mt-5">Consulta Transportador</h1>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <table class="table mt-3">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Razão_Social</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col" colspan="1">OPÇÕES</th>
                        </tr>
                        <tbody>
                            <?php
                            require_once "./config/Conexao.php";
                            $conn = Conexao::getConnection();
                            $sql = "SELECT * FROM transportador";
                            $stmt = $conn->query($sql);
                            if ($stmt->rowCount() > 0) {
                                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($linha['id_transportador']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['razao_social']) . "</td>";
                                    echo "<td>" . htmlspecialchars($linha['cnpj']) . "</td>";
                                    ?>
                                    <td>
                                        <a href="./config/select/select_transportador.php?id_transportador=<?php echo $linha['id_transportador']; ?>" class="btn btn-primary">
                                            Editar
                                        </a>
                                        <a href="./config/delete/delete_transportador.php?id_transportador=<?php echo $linha['id_transportador']; ?>" class="btn btn-danger">Excluir</a>
                                    </td>
                                    <?php
                                }
                            } 
                            $conn = Conexao::closeConnection();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-2"></div>

            </div>

        </div>
    </div>

</body>

</html>

