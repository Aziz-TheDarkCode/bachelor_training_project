<?php
class ClientController {
    private $db;
    private $client;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->client = new Client($this->db);
    }

    public function index() {
        $clients = $this->client->read();
        include '../app/views/clients/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->client->nom = $_POST['nom'];
            $this->client->prenom = $_POST['prenom'];
            $this->client->email = $_POST['email'];
            $this->client->telephone = $_POST['telephone'];

            if ($this->client->create()) {
                header('Location: index.php?action=clients');
            }
        }
        include '../app/views/clients/create.php';
    }

    public function edit($id) {
        $this->client->id = $id;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->client->nom = $_POST['nom'];
            $this->client->prenom = $_POST['prenom'];
            $this->client->email = $_POST['email'];
            $this->client->telephone = $_POST['telephone'];

            if ($this->client->update()) {
                header('Location: index.php?controller=client&action=index');
            }
        }
        $client = $this->client->readOne()->fetch(PDO::FETCH_ASSOC);
        include '../app/views/clients/edit.php';
    }

    public function delete($id) {
        $this->client->id = $id;
        if ($this->client->delete()) {
            header('Location: index.php?controller=client&action=client');
        }
    }
}
