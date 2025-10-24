<?php
include_once 'connection.php';
class RegisterUser{
    public $username;
    public $email;
    public $password;
    private $conn;
    public $db_table_name = "register";
    public function __construct($username, $email, $password)
    {
        $database = new Database();
        $this->conn = $database->getDB();
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    public function Register_(){
     $Register_query = "INSERT INTO ".$this->db_table_name." (username, email, password) VALUES (?, ?, ?)";
     $stmt = $this->conn->prepare($Register_query); 
     $stmt->bind_param("sss", $this->username, $this->email, $this->password);
     $stmt->execute();
    }
}
?>
