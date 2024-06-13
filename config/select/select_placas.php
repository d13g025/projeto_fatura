<?php

require_once '../Conexao.php';

if (isset($_GET['id_placa'])) {
    $id_placa = $_GET['id_placa'];

    $pdo = Conexao::getConnection();
    $query = "SELECT placas.id_placa, placas.placa, tipo.tipo 
                                    FROM placas 
                                    INNER JOIN tipo ON placas.id_tipo = tipo.id_tipo
                                    WHERE id_placa = :id_placa";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_placa', $id_placa);
    $stmt->execute();
    $placa = $stmt->fetch(PDO::FETCH_ASSOC);

    Conexao::closeConnection();
}
?>

<html>
    <dialog open>
        <form action="../update/update_placas.php" method="POST">
            <input type="hidden" name="id_placa" value="<?php echo $placa['id_placa']; ?>">
            <label for="placa">Placa:</label>
            <input type="text" name="placa" id="placa" value="<?php echo $placa['placa']; ?>"><br><br>
            <label name="tipo" for="">Tipo: </label>
            <select name="tipo" id="">
                <option value="1">Cavalo</option>
                <option value="2">Compartimento</option>
            </select>
            <button type="submit">Atualizar</button>
        </form>
    </dialog>
</html>