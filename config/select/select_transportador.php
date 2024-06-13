<?php

require_once '../Conexao.php';

if (isset($_GET['id_transportador'])) {
    $id_transportador = $_GET['id_transportador'];

    $pdo = Conexao::getConnection();
    $query = "SELECT id_transportador, razao_social , cnpj FROM transportador WHERE id_transportador = :id_transportador";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_transportador', $id_transportador);
    $stmt->execute();
    $transportador = $stmt->fetch(PDO::FETCH_ASSOC);

    Conexao::closeConnection();
}

?>

<html>
    <dialog open>

        <form action="../update/update_transportador.php" method="POST">
            <input type="hidden" name="id_transportador" value="<?php echo $transportador['id_transportador']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $transportador['razao_social']; ?>"><br><br>
            <label for="cnpj">CNPJ:</label>
            <input type="text" name="cnpj" id="cnpj" value="<?php echo $transportador['cnpj']; ?>"><br><br>
            <button type="submit">Atualizar</button>
        </form>

    </dialog>
</html>