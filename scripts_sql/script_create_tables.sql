--  .----------------.  .----------------.  .----------------.  .----------------.  .----------------.  .----------------. 
-- | .--------------. || .--------------. || .--------------. || .--------------. || .--------------. || .--------------. |
-- | |     ______   | || |  _______     | || |  _________   | || |      __      | || |  _________   | || |  _________   | |
-- | |   .' ___  |  | || | |_   __ \    | || | |_   ___  |  | || |     /  \     | || | |  _   _  |  | || | |_   ___  |  | |
-- | |  / .'   \_|  | || |   | |__) |   | || |   | |_  \_|  | || |    / /\ \    | || | |_/ | | \_|  | || |   | |_  \_|  | |
-- | |  | |         | || |   |  __ /    | || |   |  _|  _   | || |   / ____ \   | || |     | |      | || |   |  _|  _   | |
-- | |  \ `.___.'\  | || |  _| |  \ \_  | || |  _| |___/ |  | || | _/ /    \ \_ | || |    _| |_     | || |  _| |___/ |  | |
-- | |   `._____.'  | || | |____| |___| | || | |_________|  | || ||____|  |____|| || |   |_____|    | || | |_________|  | |
-- | |              | || |              | || |              | || |              | || |              | || |              | |
-- | '--------------' || '--------------' || '--------------' || '--------------' || '--------------' || '--------------' |
--  '----------------'  '----------------'  '----------------'  '----------------'  '----------------'  '----------------' 
--  .----------------.  .----------------.  .----------------.  .----------------.  .----------------.  .----------------. 
-- | .--------------. || .--------------. || .--------------. || .--------------. || .--------------. || .--------------. |
-- | |  _________   | || |      __      | || |   ______     | || |   _____      | || |  _________   | || |    _______   | |
-- | | |  _   _  |  | || |     /  \     | || |  |_   _ \    | || |  |_   _|     | || | |_   ___  |  | || |   /  ___  |  | |
-- | | |_/ | | \_|  | || |    / /\ \    | || |    | |_) |   | || |    | |       | || |   | |_  \_|  | || |  |  (__ \_|  | |
-- | |     | |      | || |   / ____ \   | || |    |  __'.   | || |    | |   _   | || |   |  _|  _   | || |   '.___`-.   | |
-- | |    _| |_     | || | _/ /    \ \_ | || |   _| |__) |  | || |   _| |__/ |  | || |  _| |___/ |  | || |  |`\____) |  | |
-- | |   |_____|    | || ||____|  |____|| || |  |_______/   | || |  |________|  | || | |_________|  | || |  |_______.'  | |
-- | |              | || |              | || |              | || |              | || |              | || |              | |
-- | '--------------' || '--------------' || '--------------' || '--------------' || '--------------' || '--------------' |
--  '----------------'  '----------------'  '----------------'  '----------------'  '----------------'  '----------------' 

-- Script by SOLDAN Maxens and RENAND Baptiste



DROP TABLE IF EXISTS ecrit;
DROP TABLE IF EXISTS ami;
DROP TABLE IF EXISTS Avis;
DROP TABLE IF EXISTS Livre;
DROP TABLE IF EXISTS Editeur;
DROP TABLE IF EXISTS Utilisateur;
DROP TABLE IF EXISTS Auteur;
DROP TABLE IF EXISTS Images;

CREATE TABLE Auteur (
    id_auteur INT AUTO_INCREMENT PRIMARY KEY,
    nom_auteur VARCHAR(255) NOT NULL,
    prenom_auteur VARCHAR(255) NOT NULL,
    date_de_naissance DATE,
    date_de_mort DATE
);

CREATE TABLE Editeur (
    id_editeur INT AUTO_INCREMENT PRIMARY KEY,
    nom_editeur VARCHAR(255) NOT NULL
);

CREATE TABLE Livre (
    id_livre INT AUTO_INCREMENT PRIMARY KEY,
    nom_livre VARCHAR(255) NOT NULL,
    date_de_publication DATE NOT NULL,
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


CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_data LONGBLOB,
    image_name VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
