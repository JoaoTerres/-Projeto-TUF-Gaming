<?php 

require_once './models/User.php';
require_once './models/UserDataBase.php';

$dbPatch = __DIR__ . '/sql.sqlite';
$pdo = new PDO("sqlite:$dbPatch");

if (isset($_POST['submit-register'])) {
    UserDataBase::processForm($pdo);
}  


if (isset($_POST['delete-user'])) {
    $userdb = new UserDataBase();
    $userdb->DeletUser($pdo);
}

