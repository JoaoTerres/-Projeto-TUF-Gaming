<?php
try{  
$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");
}catch (\Exception $e){
    var_dump($e->getMessage());
}
 
/* $pdo->exec('CREATE TABLE register(id INTEGER PRIMARY KEY, name TEXT, email TEXT, number TEXT, password TEXT);');   */

 //Delete Users
/*  try {
    $pdo->exec('DELETE FROM register WHERE id = 2;');
} catch (\Exception $e) {
    var_dump($e->getMessage());
}  */

