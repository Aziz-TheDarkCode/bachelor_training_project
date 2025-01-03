<?php
class Cours {
    private $conn;
    private $table_name = "cours";


    public $id;
    public $nom_cours;
    public $code_cours;
    public $nombre_heures;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nom_cours, code_cours, nombre_heures) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bind_param("ssi", $this->nom_cours, $this->code_cours, $this->nombre_heures);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nom_cours = ?, code_cours = ?, nombre_heures = ?
                  WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssii", $this->nom_cours, $this->code_cours, $this->nombre_heures, $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
