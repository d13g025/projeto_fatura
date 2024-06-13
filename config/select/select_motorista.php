<?php
require_once '../Conexao.php';

if (isset($_GET['id_motorista'])) {
    $id_motorista = $_GET['id_motorista'];

    $pdo = Conexao::getConnection();
    $sql = "SELECT id_motorista, nome, cpf FROM motorista WHERE id_motorista = :id_motorista";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_motorista', $id_motorista);
    $stmt->execute();
    $motorista = $stmt->fetch(PDO::FETCH_ASSOC);

    Conexao::closeConnection();
}
?>

<html>
    <dialog open>

        <form action="../update/update_motorista.php" method="POST">
            <input type="hidden" name="id_motorista" value="<?php echo $motorista['id_motorista']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $motorista['nome']; ?>"><br><br>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="<?php echo $motorista['cpf']; ?>"><br><br>
            <button type="submit">Atualizar</button>
        </form>

    </dialog>
</html>
