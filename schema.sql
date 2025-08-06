CREATE DATABASE IF NOT EXISTS GestionClients CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE TABLE inscription (
    id int AUTO_INCREMENT PRIMARY KEY,
    nom varchar(150) NOT NULL,
    prenom varchar(159) NOT NULL,
    telephone varchar(30) NOT NULL,
    sexe ENUM('masculin','feminin'),
    email varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;
//Creation de la table client
-- Creation de la table client pour stocker les informations des clients
CREATE TABLE client(
    Reference int AUTO_INCREMENT PRIMARY KEY,
    RaisonSociale varchar(255),
    Telephone varchar(255),
    ChiffreAffaire DECIMAL(10,2),
    CodCat VARCHAR(50) NOT NULL,
    FOREIGN KEY (CodCat) REFERENCES categorie(CodCat)
);
CREATE TABLE categorie(
    CodCat VARCHAR(50) PRIMARY KEY,
    nom_categorie varchar(255)
);