<?php
include_once '../Model/connection.php';  

class Controlleruser {
    private $User;
    public function __construct($User) {
        $this->User = $User;
    }
    public function registerUser($username, $password) {
        return $this->User->register($username, $password);
    }
}


?>
