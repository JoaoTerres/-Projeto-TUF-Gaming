<?php
class User {

    public $id;

    public $name;

    public $email;

    public $number;

    public $password;

    public $role;

    public function __construct($id, $name, $email, $number, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;
        $this->password = $password;
    }
}



