<?php
// app/controllers/CoursController.php
require_once '../models/Cours.php';
require_once '../database.php';

class CoursController {
    private $cours;
    private $db;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->cours = new Cours($db);
    }
    public function index() {
        $result = $this->cours->read();
        require_once '../views/cours/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cours->nom_cours = $_POST['nom_cours'];
            $this->cours->code_cours = $_POST['code_cours'];
            $this->cours->nombre_heures = $_POST['nombre_heures'];

            if($this->cours->create()) {
                header('Location: index.php?controller=cours&action=index');
            }
        }
        require_once '../views/cours/create.php';
    }

    public function edit($id) {
        $this->cours->id = $id;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cours->nom_cours = $_POST['nom_cours'];
            $this->cours->code_cours = $_POST['code_cours'];
            $this->cours->nombre_heures = $_POST['nombre_heures'];

            if($this->cours->update()) {
                header('Location: index.php?controller=cours&action=index');
            }
        }
        $cours = $this->cours->readOne();
        require_once '../views/cours/edit.php';
    }

    public function delete($id) {
        $this->cours->id = $id;
        if($this->cours->delete()) {
            header('Location: index.php?controller=cours&action=index');
        }
    }
}

?>
