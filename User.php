<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($emri, $email, $password) {
        $conn = $this->db->getConnection();
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        $query = "INSERT INTO users (emri, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$emri, $email, $hashed_password]);
    }

    public function login($email, $password) {
        $conn = $this->db->getConnection();
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email]);
        
        if($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                return true;
            }
        }
        return false;
    }
}
?>