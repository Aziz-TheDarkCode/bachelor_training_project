-- Create database
CREATE DATABASE IF NOT EXISTS gestion_rendez_vous;
USE gestion_rendez_vous;

-- Create clients table
CREATE TABLE IF NOT EXISTS clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create rendez_vous table
CREATE TABLE IF NOT EXISTS rendez_vous (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT NOT NULL,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE
);

-- Add some sample data
INSERT INTO clients (nom, prenom, email, telephone) VALUES
('Ndiaye', 'Abdou Aziz', 'abdou.ndiaye@email.com', '0123456789'),
('Ndir', 'Ibrahima', 'ibrahima.ndir@email.com', '0987654321');

INSERT INTO rendez_vous (client_id, date, heure, description) VALUES
(1, '2025-01-10', '14:30:00', 'Premier rendez-vous'),
(2, '2025-01-15', '10:00:00', 'Consultation de suivi');
