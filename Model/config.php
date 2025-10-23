<?php
class Config {
    public $hostname = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "e_commerce";
    public function getDsn() {
        return "mysql:host={$this->hostname}; </br> dbname={$this->database}";
    }
}
$config = new Config();   
echo $config->getDsn();
?>