<?php
// public/index.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../app/database.php';
require_once '../app/models/Client.php';
require_once '../app/models/RendezVous.php';
require_once '../app/controllers/ClientController.php';
require_once '../app/controllers/RendezVousController.php';

$controller = $_GET['controller'] ?? 'client';
$action = $_GET['action'] ?? 'index';

try {
    switch ($controller) {
        case 'client':
            $controller = new ClientController();
            break;
        case 'rendezvous':
            $controller = new RendezVousController();
            break;
        default:
            throw new Exception("Contrôleur non trouvé");
    }

    if (method_exists($controller, $action)) {
        if (in_array($action, ['edit', 'delete'])) {
            $id = $_GET['id'] ?? null;
            if ($id === null) {
                throw new Exception("ID manquant pour l'action $action");
            }
            $controller->$action($id);
        } else {
            $controller->$action();
        }
    } else {
        echo "Debug - Action $action not found in controller<br>";
        throw new Exception("Action non trouvée");
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
