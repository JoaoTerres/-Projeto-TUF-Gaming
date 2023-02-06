<?php

session_start();

include_once 'models/Register.php';

// Conexão com o banco de dados
$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");
