<?php
include_once 'sprite_maker_api_config.php';
class Database
{

    private $host = DATABASE_HOST;
    private $db_name = DATABASE;
    private $username = USERNAME;
    private $password = PASSWORD;
    public $conn;

    public function getDatabaseConnection()
    {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
