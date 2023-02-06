<?php

include_once 'config.php';

$usuarioLogado = Register::logged($pdo);

$dadosregister = $pdo->query('SELECT * FROM register;')->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
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
         <div class="box">
            <h1><img class="img" src="./img/fox.png" alt="Logo TUF GAMING"></h1>
            <nav>
               <ul>
                  <li><a href="home.html">Home</a></li>
                  <li><a href="register.html">Cadastre-se</a></li>
                  <li><a href="logout.php">Sair</a></li>
               </ul>
            </nav>
         </div>
      </header>
      <main>
         <h3>Olá, <?= $usuarioLogado->name ?> (<?= $usuarioLogado->getNivel() ?>)</h3>
         <table>
            <tr>
               <th>Nome</th>
               <th>Email</th>
               <th>Telefone</th>
               <?php if ($usuarioLogado->role == 2){ ?>
                  <th>Excluir Usuário</th>
               <?php } ?>
            </tr>
            <tr>
            <?php foreach ($dadosregister as $register) { ?>
               <td><?php echo $register['name'];?></td>
               <td><?php echo $register['email'];?></td>
               <td><?php echo $register['number'];?></td>
               <?php if ($_SESSION['role'] == 2){ ?>
                  <td>
                     <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $register['id']; ?>">
                        <input type="submit" value="Excluir">
                     </form>
                  </td>
               <?php } ?>
            </tr>
            <?php } ?>
         </table>
      </main>
</html>