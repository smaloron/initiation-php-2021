-- Suppression de la BD
DROP DATABASE IF EXISTS formation_php;

-- Création de la BD
CREATE DATABASE formation_php DEFAULT CHARACTER SET utf8;

USE formation_php;

-- Création de la table
CREATE TABLE livres (
    id INT UNSIGNED AUTO_INCREMENT,
    titre VARCHAR(50) NOT NULL,
    auteur VARCHAR(50) NOT NULL,
    prix DECIMAL(5,2) NOT NULL,
    PRIMARY KEY (id)
);