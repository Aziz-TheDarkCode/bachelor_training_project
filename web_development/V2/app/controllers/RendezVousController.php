<?php
class RendezVousController {
    private $db;
    private $rendezVous;
    private $client;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->rendezVous = new RendezVous($this->db);
        $this->client = new Client($this->db);
    }

    public function index() {
        $rendezVous = $this->rendezVous->read();
        include '../app/views/rendezvous/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->rendezVous->date = $_POST['date'];
            $this->rendezVous->heure = $_POST['heure'];
            $this->rendezVous->description = $_POST['description'];
            $this->rendezVous->client_id = $_POST['client_id'];

            if ($this->rendezVous->create()) {
                header('Location: index.php?action=rendezvous');
            }
        }
        $clients = $this->client->read();
        include '../app/views/rendezvous/create.php';
    }

    public function edit($id) {
        $this->rendezVous->id = $id;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->rendezVous->date = $_POST['date'];
            $this->rendezVous->heure = $_POST['heure'];
            $this->rendezVous->description = $_POST['description'];
            $this->rendezVous->client_id = $_POST['client_id'];

            if ($this->rendezVous->update()) {
                header('Location: index.php?action=index');
            }
        }
        $rendezVous = $this->rendezVous->readOne()->fetch(PDO::FETCH_ASSOC);
        $clients = $this->client->read();
        include '../app/views/rendezvous/edit.php';
    }

    public function delete($id) {
        $this->rendezVous->id = $id;
        if ($this->rendezVous->delete()) {
            header('Location: index.php?action=index');
        }
    }
}
