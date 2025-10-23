<?php
include_once 'connection.php';
class User {
    private $conn;
    private $table_name = "register";
    public $id;
    public $username;
    public $email;
    public $password;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function register() {
        $register_query = "INSERT INTO " . $this->table_name . " (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($register_query);
        $hashed_password = md5($this->password);
        $stmt->bind_param("sss", $this->username, $this->email, $hashed_password);
        return $stmt->execute();
    }
    public function login() {
        $login_query = "SELECT id, username, email, password FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->conn->prepare($login_query);
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $stmt->store_result();                                                          
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($this->id, $this->username, $this->email, $db_password);
            $stmt->fetch();
            if (md5($this->password) === $db_password) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
