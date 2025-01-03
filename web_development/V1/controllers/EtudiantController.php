<?php


require_once '../models/Etudiant.php';
require_once '../database.php';

class EtudiantController {
    private $etudiant;
    private $db;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->etudiant = new Etudiant($db);
    }

    public function index() {
        $result = $this->etudiant->read();
        require_once '../views/etudiants/index.php';
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->etudiant->nom = $_POST['nom'];
            $this->etudiant->prenom = $_POST['prenom'];
            $this->etudiant->email = $_POST['email'];
            $this->etudiant->filiere = $_POST['filiere'];

            if($this->etudiant->create()) {
                header('Location: index.php?action=index');
            }
        }
        require_once '../views/etudiants/create.php';
    }

    public function edit($id) {
        $this->etudiant->id = $id;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->etudiant->nom = $_POST['nom'];
            $this->etudiant->prenom = $_POST['prenom'];
            $this->etudiant->email = $_POST['email'];
            $this->etudiant->filiere = $_POST['filiere'];

            if($this->etudiant->update()) {
                header('Location: index.php?action=index');
            }
        }
        $etudiant = $this->etudiant->readOne();
        require_once '../views/etudiants/edit.php';
    }

    public function delete($id) {
        $this->etudiant->id = $id;
        if($this->etudiant->delete()) {
            header('Location: index.php?action=index');
        }
    }
}
?>
