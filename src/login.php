<?php

?><!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>TUF GAMING</title>

        <link rel="stylesheet" href="./css/login.css">
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/header.css">
    </head>        
    
    <body>
        <header>
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
            <div class="container">
            <div class="login">
                <h1 class="name">Login</h1>
                <form action="safety.php" method="POST">
                        
                    <input type="email" name="email" id="email" placeholder="Email" required>
                        
                    <input type="password" name="password" id="password" placeholder="Senha" required>
                        
                    <input class="inputSubmit" type="submit" name="submit" id="submit">
                </form>
            </div>
            </div>
        </main>   
    </body>
    
</html>