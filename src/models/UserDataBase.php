<?php

class UserDataBase {

    public function insertDB($pdo, User $user) 
    {
        try {
            $sql = "INSERT INTO register (name, email, number, password) VALUES (?,?,?,?)";
            $statement = $pdo->prepare($sql);
            $result = $statement->execute([$user->name, $user->email, $user->number, $user->password]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        if ($result === false){
            header('Location: /register.html?sucesso=0');
        }else{
            header('Location: /home.html?sucesso=1');
        }
    
    }

    public static function processForm($pdo) 
    { 
        $formData = $_POST;
        $userObject = new User($formData['id'], $formData['name'], $formData['email'], $formData['number'], $formData['password']);
        $db = new UserDataBase();
        $db->insertDB($pdo, $userObject);    
    }

    public function DeletUser($pdo){
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
          
          
            $sql = "DELETE FROM register WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
        }
        header('Location: control.php');
        exit;
    }
}