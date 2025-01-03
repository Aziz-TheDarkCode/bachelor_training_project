<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../app/config/bootstrap.php";

$route = str_replace('/gestion_ferme/public', '', $_SERVER['REQUEST_URI']);;
$method = $_SERVER['REQUEST_METHOD'];

// Create controller instances
$animalController = new \App\Controllers\AnimalController($entityManager);
$equipmentController = new \App\Controllers\EquipmentController($entityManager);
// Simpl router
switch (true) {
    // Animal routes
    case $route === '/animals' && $method === 'GET':
        echo $animalController->index();
        break;
    
    case $route === '/animals/create' && $method === 'GET':
        echo $animalController->create();
        break;
        
    case $route === '/animals' && $method === 'POST':
        $animalController->store();
        break;
        
    case preg_match('/\/animals\/(\d+)\/edit/', $route, $matches) && $method === 'GET':
        echo $animalController->edit($matches[1]);
        break;
        
    case preg_match('/\/animals\/(\d+)/', $route, $matches) && $method === 'PUT':
        $animalController->update($matches[1]);
        break;
        
    case preg_match('/\/animals\/(\d+)/', $route, $matches) && $method === 'DELETE':
        $animalController->destroy($matches[1]);
        break;

    // Equipment routes
    case $route === '/equipment' && $method === 'GET':
        echo $equipmentController->index();
        break;
    
    case $route === '/equipment/create' && $method === 'GET':
        echo $equipmentController->create();
        break;
        
    case $route === '/equipment' && $method === 'POST':
        $equipmentController->store();
        break;
        
    case preg_match('/\/equipment\/(\d+)\/edit/', $route, $matches) && $method === 'GET':
        echo $equipmentController->edit($matches[1]);
        break;
        
    case preg_match('/\/equipment\/(\d+)/', $route, $matches) && $method === 'PUT':
        $equipmentController->update($matches[1]);
        break;
        
    case preg_match('/\/equipment\/(\d+)/', $route, $matches) && $method === 'DELETE':
        $equipmentController->destroy($matches[1]);
        break;

    default:
        header("HTTP/1.0 404 Not Found");
    echo "40 Not Found";
        break;
}
