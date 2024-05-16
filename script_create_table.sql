DROP TABLE IF EXISTS ecrit;
DROP TABLE IF EXISTS ami;
DROP TABLE IF EXISTS Avis;
DROP TABLE IF EXISTS Livre;
DROP TABLE IF EXISTS Editeur;
DROP TABLE IF EXISTS Utilisateur;
DROP TABLE IF EXISTS Auteur;

CREATE TABLE Auteur (
    id_auteur INT AUTO_INCREMENT PRIMARY KEY,
    nom_auteur VARCHAR(255) NOT NULL,
    prenom_auteur VARCHAR(255) NOT NULL,
    date_de_naissance DATE,
    date_de_mort DATE
);

CREATE TABLE Editeur (
    id_editeur INT AUTO_INCREMENT PRIMARY KEY,
    nom_editeur VARCHAR(255) NOT NULL,
    prenom_editeur VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_inscription DATE NOT NULL
);

CREATE TABLE Livre (
    id_livre INT AUTO_INCREMENT PRIMARY KEY,
    nom_livre VARCHAR(255) NOT NULL,
    annee DATE NOT NULL,
    genre VARCHAR(255),
    id_editeur INT,
    FOREIGN KEY (id_editeur) REFERENCES Editeur(id_editeur)
);

CREATE TABLE Utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(255) NOT NULL,
    prenom_utilisateur VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_inscription DATE NOT NULL
);

CREATE TABLE Avis (
    id_avis INT AUTO_INCREMENT PRIMARY KEY,
    note INT NOT NULL,
    commentaire TEXT,
    date_avis DATE NOT NULL,
    id_livre INT,
    id_utilisateur INT,
    FOREIGN KEY (id_livre) REFERENCES Livre(id_livre),
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE ecrit (
    id_auteur INT,
    id_livre INT,
    PRIMARY KEY (id_auteur, id_livre),
    FOREIGN KEY (id_auteur) REFERENCES Auteur(id_auteur),
    FOREIGN KEY (id_livre) REFERENCES Livre(id_livre)
);

CREATE TABLE ami (
    id_utilisateur1 INT,
    id_utilisateur2 INT,
    PRIMARY KEY (id_utilisateur1, id_utilisateur2),
    FOREIGN KEY (id_utilisateur1) REFERENCES Utilisateur(id_utilisateur),
    FOREIGN KEY (id_utilisateur2) REFERENCES Utilisateur(id_utilisateur)
);
