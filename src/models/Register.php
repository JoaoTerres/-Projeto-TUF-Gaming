<?php

class Register {

    public $email;

    public $password;

    public $role;

    public $name;

    public function login($pdo)
    {
        //consulta e verificação usuário banco de dados.
        try { 
            $sql = 'SELECT * FROM register WHERE email = ? AND password = ?;';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $this->email);
            $statement->bindValue(2, $this->password);
            $statement->execute();

            $usuario = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $usuario = [];
            var_dump($e->getMessage());
        }

        if ($usuario) {
            $this->fillFromDatabase($usuario);
            return true;
        } else {
            return false;
        }
    }

    public function fillFromDatabase($usuario)
    {
        $this->role = $usuario['role'];
        $this->name = $usuario['name'];
    }

    public function getNivel()
    {
        if ($this->role == 1) {
            return 'Cliente';
        }

        if ($this->role == 2) {
            return 'Administrador';
        }
    }

    public static function logged($pdo)
    {
        //verifica se tem sessao ativa, caso contraio remove sessao e redireciona
        if ((!isset($_SESSION['email']) || !isset($_SESSION['password']))) {
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            header('Location: login.php');
            exit;
        }

        try { 
            $sql = 'SELECT * FROM register WHERE email = ?;';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $_SESSION['email']);
            $statement->execute();

            $usuario = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $usuario = [];
            var_dump($e->getMessage());
        }

        $usuarioObjeto = new Register;
        $usuarioObjeto->fillFromDatabase($usuario);

        return $usuarioObjeto;
    }

}