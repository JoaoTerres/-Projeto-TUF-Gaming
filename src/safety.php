<?php
session_start();

$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");

//Verifica se não tem campo vazio.
if (isset($_POST['submit'])) {
    if(empty($_POST['email']) || empty($_POST['password'])){
        header('Location: login.html?error=empty_fields');
        exit;
    }
    //consulta e verificação usuário banco de dados.
    try { 
        $sql = 'SELECT * FROM register WHERE email = ? AND password = ?;';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_POST['email']);
        $statement->bindValue(2, $_POST['password']);
        $statement->execute();

        $usuario = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        $usuario = [];
        var_dump($e->getMessage());
    }
    //Se for encontrado armazena na sessão e redireciona. Caso contrario limpa sessão e redireciona.    
    if ($usuario) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        header('Location: control.php');
        exit;
    } else {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: login.php?error=invalid_credentials');
        exit;
    }
} else {
    header('Location: login.html');
    exit;
}