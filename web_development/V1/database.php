<?php
class Database {
    private $host = "localhost";
    private $db_name = "gestion_universitaire";
    private $username = "root";
    private $password = "1234";
    private $conn;

    public function getConnection() {
        $this->conn = null;

    try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            $this->conn->set_charset("utf8");
        } catch(Exception $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }

        return $this->conn;
    }
    
}
?>
