<?php
session_start();

// Conexão com o banco de dados
$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");

//verifica se tem sessao ativa, caso contraio remove sessao e redireciona
if ((!isset($_SESSION['email']) || !isset($_SESSION['password']))) {
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  header('Location: login.html');
  exit;
}
$logado = $_SESSION['email'];
print_r($logado);

//fazer botao se sair
//fazer tabela pra listar ussuarios
?><!DOCTYPE html> 
<html>
  <form action="logout.php" method="post">
    <input type="submit" value="Logout">
  </form>
</html>


