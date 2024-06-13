<?php

class Login_bd {
    
    public function validarLogin($login, $senha) {
        try {
            include_once 'Conexao.php';
            $pdo = Conexao::getConnection();
            $query = "SELECT * FROM login WHERE login = :login AND senha = :senha";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                // Login válido
                return true;
            } else {
                // Login inválido
                return false;
            }
        } catch (PDOException $e) {
            // Tratar exceção, se necessário
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
}

$login_bd = new Login_bd();
$login = $_POST['login'];
$senha = $_POST['senha'];

if ($login_bd->validarLogin($login, $senha)) {
    session_start();
    $_SESSION['login'] = $login;
    echo "Login válido!";
    header('Location: ../home.php');
  } else {
    echo "Login inválido!";
    header('Location: ../Login.php');
  }
?>
