-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_universitaire;

-- Sélection de la base de données
USE gestion_universitaire;

-- Création de la table étudiants
CREATE TABLE IF NOT EXISTS etudiants (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    filiere VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table cours
CREATE TABLE IF NOT EXISTS cours (
    id SERIAL PRIMARY KEY,
    nom_cours VARCHAR(200) NOT NULL,
    code_cours VARCHAR(50) NOT NULL UNIQUE,
    nombre_heures INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
