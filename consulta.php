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
            <?php require 'sidebar.php'; ?>
        </div>
        <div class="col border-bottom">

            <div id="content" class="row text-center mt-5">

                <div class="col mt-5 pt-5">

                    <button type="button" class="btn btn-outline-secondary"><a href="consulta_motorista.php">CONSULTA MOTORISTA</a></button>
                    
                    <button type="button" class="btn btn-outline-secondary"><a href="consulta_placa.php">CONSULTA PLACAS</a></button>

                    <button type="button" class="btn btn-outline-secondary"><a href="consulta_transportador.php">CONSULTA TRANSPORTADOR</a></button>

                    <button type="button" class="btn btn-outline-secondary"><a href="consulta_fatura.php">CONSULTA FATURAS</a></button>

                </div>



            </div>

        </div>
    </div>

</body>

</html>