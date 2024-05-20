<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "./Bootstrap/bootstrap.php" ?>
    <link rel="stylesheet" href="./style.css">
    <title>HOME</title>
</head>

<body>

    <div class="container-sidebar">
        <div class="row">
            <div class="col-2">
                <?php require_once "sidebar.php"; ?>
            </div>
            <div class="container col-10">
                <div class="border-bottom bg-black  p-5">
                    <h1 class="text-center" style="color: violet">HOME</h1>
                </div>

                <div class="col-10 ms-5 pt-3">
                    <div class="">
                        <div class="container">

                            <?php require_once "fatura.php"; ?>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






</body>

</html>