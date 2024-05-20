    <div class="container mt-1 mb-2">
        <h2 class="text-center">Emissão de Fatura</h2>
        <form>

            <div class="row">
                <div class="col"></div>
                <div class="col mb-3 mt-1">
                    <label for="invoiceNumber" class="form-label">Número da Fatura</label>
                    <input type="text" class="form-control" id="invoiceNumber" placeholder="Digite o número da fatura">
                </div>
                <div class="col mb-3">
                    <label for="invoiceDate" class="form-label">Data</label>
                    <input type="date" class="form-control" id="invoiceDate">
                </div>
                <div class="col"></div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="driver" class="form-label">Motorista</label>
                    <input type="text" class="form-control" id="driver" placeholder="Digite o nome do motorista">
                </div>
                <div class="col mb-3">
                    <label for="plate" class="form-label">Placa</label>
                    <input type="text" class="form-control" id="plate" placeholder="Digite a placa">
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>


            <div class="row">

                <div class="col mb-3">
                    <label for="product" class="form-label">Produto</label>
                    <input type="text" class="form-control" id="product" placeholder="Digite o nome do produto">
                </div>
                <div class="col mb-3">
                    <label for="volume" class="form-label">Volume</label>
                    <input type="number" class="form-control" id="volume" placeholder="Digite o volume">
                </div>
                <div class="col mb-3">
                    <label for="unitPrice" class="form-label">Valor Unitário</label>
                    <input type="number" class="form-control" id="unitPrice" placeholder="Digite o valor unitário" step="0.01">
                </div>
                <div class="col mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" class="form-control" id="total" placeholder="Digite o valor total" step="0.01">
                </div>
            </div>
    
                <button type="submit" class="btn btn-primary">Emitir Fatura</button>
        </form>
    </div>