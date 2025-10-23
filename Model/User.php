<?php
class User {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function register($username, $password) {
        $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        return $stmt->execute();
    }
}
?>
