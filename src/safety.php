<?php

include_once 'config.php';

//Verifica se não tem campo vazio.
if (isset($_POST['submit'])) {
    if(empty($_POST['email']) || empty($_POST['password'])){
        header('Location: login.html?error=empty_fields');
        exit;
    }
    
    $usuario = new Register;
    $usuario->email = $_POST['email'];
    $usuario->password = $_POST['password'];

    //Se for encontrado armazena na sessão e redireciona. Caso contrario limpa sessão e redireciona.    
    if ($usuario->login($pdo)) {
        $_SESSION['role'] = $usuario->role;
        $_SESSION['email'] = $usuario->email;
        $_SESSION['password'] = $usuario->password;
        header('Location: control.php');
        exit;
    } else {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: login.html?error=invalid_credentials');
        exit;
    }
} else {
    header('Location: login.html');
    exit;
}