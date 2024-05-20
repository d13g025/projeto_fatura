<?php

//conecto ao banco
require_once "./meu_projeto/config/conexao.php";

//pego as variaveis
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

//insere os dados no banco
$sql = "INSERT INTO motorista (nome, cpf) VALUES ('$nome', '$cpf')";

 $mysqli->query($sql);

if($mysqli ===true){
    echo "cadastro realizado com sucesso";
}
else{
    echo "Erro: " . $sql . "<br>" . $mysqli->error;
}

//fecha a conexao
$mysqli->close();

?>
