<?php
// app/models/Etudiant.php

class Etudiant {
    private $conn;
    private $table_name = "etudiants";

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $filiere;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nom, prenom, email, filiere) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bind_param("ssss", $this->nom, $this->prenom, $this->email, $this->filiere);
        
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
                  SET nom = ?, prenom = ?, email = ?, filiere = ?
                  WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $this->nom, $this->prenom, $this->email, $this->filiere, $this->id);
        
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
