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
            // Shto charset=utf8mb4 në DSN
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                $this->username,
                $this->password
            );
            // Ndrysho 'utf8' në 'utf8mb4'
            $this->conn->exec("set names utf8mb4");
        } catch(PDOException $exception) {
            echo "Gabim në lidhje: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>