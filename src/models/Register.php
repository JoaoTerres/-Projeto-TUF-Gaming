<?php
class Register {

    public $name;

    public $email;

    public $number;

    public $password;

    public function __construct($name, $email, $number, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;
        $this->password = $password;
        
    }

    public function insertDB($pdo) 
    {
        try {
            $sql = "INSERT INTO register (name, email, number, password) VALUES (?,?,?,?)";
            $statement = $pdo->prepare($sql);
            $result = $statement->execute([$this->name, $this->email, $this->number, $this->password]);
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
        $register = new Register($formData['name'], $formData['email'], $formData['number'], $formData['password']);
        $register->insertDB($pdo);   
    }
    
}



