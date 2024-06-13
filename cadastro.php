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
            <?php require 'sidebar.php'; ?>
        </div>
        <div class="col ms-3 ps-1 border-bottom">
            <div class="row mt-5 pt-3 border-top" style="height: 5rem;">
                <h2 class="text-center">CADASTRO</h2>
            </div>
            <div id="content" class="text-center">
                <div class="row pe-5">

                <!-- ================================================================================ -->
                    <div class="col-4 border rounded "><!--Cadastro do Motorista-->

                        <form action="./config/insert/insert_motorista.php" method="POST">
                            <div class="row align-items-center pt-4 pb-2">
                                <h5 class="text-center">CADASTRO MOTORISTA</h5>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <label for="nome" id="nome" class="col-form-label">Nome</label>
                                </div>
                                <div class="col">
                                    <input class="form-control" name="nome" type="text" required>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <label for="" class="col-form-label">CPF</label>
                                </div>
                                <div class="col">
                                    <input class="form-control" id="cpf" name="cpf" type="text" placeholder="000.000.000-00" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" minlength="14" maxlength="14" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-5 mb-5">
                                <input class="btn btn-primary" type="submit" value="Cadastrar">
                                <input class="ms-3 btn btn-danger" type="reset" value="Cancelar">
                            </div>
                        </form>
                    </div>

                 <!-- ================================================================================ -->

                    <div class="col-4 border  rounded "> <!--Cadastro do Motorista-->

                        <form action="./config/insert/insert_transportadora.php" method="POST">
                            <div class="row align-items-center pt-4 pb-2">
                                <h5 class="text-center">CADASTRO TRANSPORTADORA</h5>
                            </div>

                            <div class="row align-items-center">
                                <div class="col">
                                    <label for="" class="col-form-label">Razão Social: </label>
                                </div>
                                <div class="col">
                                    <input id="transportador" name="transportador" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <label for="" class="col-form-label">CNPJ: </label>
                                </div>
                                <div class="col">
                                    <input id="cnpj" name="cnpj" class="form-control" type="text" placeholder="00.000.000/0000-00" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" minlength="18" maxlength="18" require>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-5 mb-5">
                                <input class="btn btn-primary" type="submit" value="Cadastrar">
                                <input class="ms-3 btn btn-danger" type="reset" value="Cancelar">
                            </div>
                        </form>
                    </div>

                 <!-- ================================================================================ -->

                    <div class="col-4 pe-2 border rounded"> <!--Cadastro do Veiculo-->

                        <form action="./config/insert/insert_placas.php" method="POST">
                            <div class="row align-items-center pt-4 pb-2">
                                <h5 class="text-center">CADASTRO VEÍCULO</h5>
                            </div>

                            <div class="row align-items-center">
                                <div class="col">
                                    <label for="" class="col-form-label">PLACA: </label>
                                </div>
                                <div class="col">
                                    <input class="form-control" name="placa" id="placa" type="text" pattern="([A-Z]{3}-[0-9][A-Z][0-9]{2}|[A-Z]{3}-[0-9]{4})" title="Formato esperado: AAA-0000" required>
                                </div>
                            </div>
                            <div class="row align-items-center mt-2 mb-3">
                                <div class="col">
                                    <label for="" class="col-form-label">Tipo:</label>
                            </div>
                                <div class="col w-75 align-items-center">
                                    <select class="form-select" name="tipo" id="tipo" require>
                                        <option value="1">Cavalo</option>
                                        <option value="2">Compartimento</option>
                                    </select>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center mt-5 mb-5">
                                <input class="btn btn-primary" type="submit" value="Cadastrar">
                                <input class="ms-3 btn btn-danger" type="reset" value="Cancelar">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>


</html>