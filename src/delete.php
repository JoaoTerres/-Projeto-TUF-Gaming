<?php
session_start();

// Conexão com o banco de dados
$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");

// Verifica se o ID foi enviado via POST
if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Prepara e executa a consulta para excluir o registro
  $sql = "DELETE FROM register WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}

// Redireciona para a página de controle
header('Location: control.php');
exit;
?>