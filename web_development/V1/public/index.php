<?php
// public/index.php

// Activation de l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controllers/EtudiantController.php';
require_once '../controllers/CoursController.php';

$controller = $_GET['controller'] ?? 'etudiant';
$action = $_GET['action'] ?? 'index';


try {
    // Instanciation du contrôleur approprié
    switch ($controller) {
        case 'etudiant':
            $controller = new EtudiantController();
            break;
        case 'cours':
            $controller = new CoursController();
            break;
        default:
            throw new Exception("Contrôleur non trouvé");
    }

    // Vérification et exécution de l'action
    if (method_exists($controller, $action)) {
        if ($action == 'edit' || $action == 'delete') {
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
