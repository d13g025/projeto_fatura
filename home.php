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
    <title>HOME</title>
</head>

<body>
    <div class="row">
        <div class="col-4 div1">
            <?php require_once "./sidebar.php"; ?>
        </div>
        <div class="col border-bottom">

            <div id="content" class="text-center mt-5">

                <h1>Bem-vindo ao sistema de faturamento</h1>
                <h3 class="mt-3">Escolha uma das opções no menu lateral</h3>

                <div class="mt-5">
                    <img src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExOGxlNXlpZGtpZG1maWd0dTd5dDJyZDQzNHNwdjdqdjM0NnZvZHlmbyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/GRPy8MKag9U1U88hzY/giphy.webp" style="width: 25%;" alt="">
                </div>

            </div>

        </div>
    </div>

</body>

</html>