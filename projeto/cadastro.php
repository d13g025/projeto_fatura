<div class="container row formatar">

    <div class="col-4 border rounded"><!--Cadastro do Motorista-->
        
        <form action="motorista.php" method="get">
            <div class="row align-items-center pt-4 pb-2">
                <h5 class="text-center">CADASTRO MOTORISTA</h5>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <label for="" class="col-form-label">Nome</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col">
                    <label for="" class="col-form-label">CPF</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" max="11">

                </div>
            </div>
            <div class="d-flex justify-content-center mt-3 mb-5">
                <button type="button" class="btn btn-info">Cadastrar</button>
            </div>
        </form>


    </div>

    <div class="col-4 border  rounded "> <!--Cadastro do Motorista-->
        
        <form action="transportadora.php" method="get">
            <div class="row align-items-center pt-4 pb-2">
                <h5 class="text-center">CADASTRO TRANSPORTADORA</h5>
            </div>

            <div class="row align-items-center">
                <div class="col">
                    <label for="" class="col-form-label">Tranportadora: </label>
                </div>
                <div class="col">
                    <input class="form-control" type="text">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col">
                    <label for="" class="col-form-label">CNPJ: </label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" max="14">
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3 mb-5">
                <button type="button" class="btn btn-info">Cadastrar</button>
            </div>
        </form>

    </div>

    <div class="col-4 border rounded"> <!--Cadastro do Veiculo-->
         
         <form action="veiculo.php" method="get">
            <div class="row align-items-center pt-4 pb-2">
                <h5 class="text-center">CADASTRO VEÍCULO</h5>
            </div>

            <div class="row align-items-center">
                <div class="col">
                    <label for="" class="col-form-label">PLACA: </label>
                </div>
                <div class="col">
                    <input class="form-control" type="text">
                </div>
            </div>
            <div class="row align-items-center mt-5 ms-2 mb-3">
                <div class="col form-check ">
                    <input class="form-check-input" type="radio">
                    <label for="">CAVALO</label>
                </div>

                <div class="col form-check">
                        <input class=" form-check-input" type="radio">
                    <label for="">COMPARTIMENTO</label>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3 mb-5">
                <button type="button" class="btn btn-info">Cadastrar</button>
            </div>
        </form>
    </div>
</div>