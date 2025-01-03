<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require __DIR__ . '/../../vendor/autoload.php';

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(
    [__DIR__ . "/../Models"],
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);

// Database configuration
$dbParams = require_once "database.php";

// obtaining the entity manager
$entityManager = EntityManager::create($dbParams, $config);

// Initialize Blade
$views = __DIR__ . '/../views';
$cache = __DIR__ . '/cache';
$blade = new \Jenssegers\Blade\Blade($views, $cache);

// Helper function for views
function view($template, $data = []) {
    global $blade;
    return $blade->make($template, $data)->render();
}

// Helper function for redirects
function redirect($path) {
    header("Location: $path");
    exit();
}
