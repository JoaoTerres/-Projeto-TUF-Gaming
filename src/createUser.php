<?php 
require_once './models/Register.php';
$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");

Register::processForm($pdo);




