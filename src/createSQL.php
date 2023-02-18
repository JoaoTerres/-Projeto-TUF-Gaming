<?php
try{  
$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");
}catch (\Exception $e){
    var_dump($e->getMessage());
}