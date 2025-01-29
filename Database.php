<?php
class Database {
    private $host = "localhost";
    private $db_name = "tech_solutions";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                $this->username,
                $this->password
            );
            
            $this->conn->exec("set names utf8mb4");
        } catch(PDOException $exception) {
            echo "Gabim në lidhje: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>