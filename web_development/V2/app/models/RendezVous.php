<?php
class RendezVous {
    private $conn;
    private $table_name = "rendez_vous";

    public $id;
    public $date;
    public $heure;
    public $description;
    public $client_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
        (date, heure, description, client_id) VALUES
        (:date, :heure, :description, :client_id)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":heure", $this->heure);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":client_id", $this->client_id);

        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT r.*, c.nom, c.prenom
        FROM " . $this->table_name . " r
        LEFT JOIN clients c ON r.client_id = c.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT r.*, c.nom, c.prenom
        FROM " . $this->table_name . " r
        LEFT JOIN clients c ON r.client_id = c.id
        WHERE r.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
        SET date = :date, heure = :heure,
        description = :description, client_id = :client_id
        WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":heure", $this->heure);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":client_id", $this->client_id);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
