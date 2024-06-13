<?php

class Conexao {
    private static $connection;

    public static function getConnection(){
        $host = "localhost";
        $dbname = "projeto_fatura";
        $userDb = "root";
        $pass = "";
        $port = "3306";

        if (!self::$connection) {
            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $userDb, $pass);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Conexão realizada com sucesso!";
            } catch (PDOException $e) {
                echo "Erro na conexão: " . $e->getMessage();
            }
        }

        return self::$connection;
    }

    public static function closeConnection(){
        self::$connection = null;
    }
}
?>
