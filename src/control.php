<?php
session_start();

// Conexão com o banco de dados
$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");
$dadosregister = $pdo->query('SELECT * FROM register;')->fetchAll(PDO::FETCH_ASSOC);

//verifica se tem sessao ativa, caso contraio remove sessao e redireciona
if ((!isset($_SESSION['email']) || !isset($_SESSION['password']))) {
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  header('Location: login.php');
  exit;
}
$logado = $_SESSION['email'];
?><!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width">
      <title>TUF GAMING</title>
      <link rel="stylesheet" href="./css/control.css">
      <link rel="stylesheet" href="./css/header.css">
      <script src="logout.js"></script>
   </head>
   <body>
      <header>
         <form action="logout.php" method="post">
            <li><input class="header-btn" type="submit" value="Sair"></li>
         </form>
         <div class="box">
            <h1><img class="img" src="./img/fox.png" alt="Logo TUF GAMING"></h1>
            <nav>
               <ul>
                  <li><a href="home.html">Home</a></li>
                  <li><a href="register.html">Cadastre-se</a></li>
               </ul>
            </nav>
         </div>
      </header>
      <main>
         <table>
            <tr>
               <th>Nome</th>
               <th>Email</th>
               <th>Telefone</th>
               <th>Excluir Usuário</th>
            </tr>
            <tr>
            <?php foreach ($dadosregister as $register) { ?>
               <td><?php echo $register['name'];?></td>
               <td><?php echo $register['email'];?></td>
               <td><?php echo $register['number'];?></td>
               <td>
                  <form action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $register['id']; ?>">
                      <input type="submit" value="Excluir">
                  </form>
               </td>
            </tr>
            <?php } ?>
         </table>
      </main>
</html>