<?php 

$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");

try {
    $sql = 'INSERT INTO register (name, email, number, password) VALUES(?, ?, ?, ?)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_POST['name']);
    $statement->bindValue(2, $_POST['email']);
    $statement->bindValue(3, $_POST['number']);
    $statement->bindValue(4, $_POST['password']);
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

if ($statement->execute() === false){
    header('Location: /register.html?sucesso=0');
}else{
    header('Location: /home.html?sucesso=1');
}