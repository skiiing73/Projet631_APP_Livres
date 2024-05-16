
--  .----------------.  .----------------.  .----------------.  .----------------. 
-- | .--------------. || .--------------. || .--------------. || .--------------. |
-- | |  ________    | || |      __      | || |  _________   | || |      __      | |
-- | | |_   ___ `.  | || |     /  \     | || | |  _   _  |  | || |     /  \     | |
-- | |   | |   `. \ | || |    / /\ \    | || | |_/ | | \_|  | || |    / /\ \    | |
-- | |   | |    | | | || |   / ____ \   | || |     | |      | || |   / ____ \   | |
-- | |  _| |___.' / | || | _/ /    \ \_ | || |    _| |_     | || | _/ /    \ \_ | |
-- | | |________.'  | || ||____|  |____|| || |   |_____|    | || ||____|  |____|| |
-- | |              | || |              | || |              | || |              | |
-- | '--------------' || '--------------' || '--------------' || '--------------' |
--  '----------------'  '----------------'  '----------------'  '----------------' 

-- Script by SOLDAN Maxens and RENAND Baptiste

-- Insertions des auteurs dans la base de données --

INSERT INTO Auteur (nom_auteur, prenom_auteur, date_de_naissance, date_de_mort) VALUES
('Herbert', 'Frank', '1920-10-08', '1986-02-11'),
('Hugo', 'Victor', '1802-02-26', '1885-05-22'),
('Dumas', 'Alexandre', '1802-07-24', '1870-12-05'),
('Zola', 'Émile', '1840-04-02', '1902-09-29'),
('Flaubert', 'Gustave', '1821-12-12', '1880-05-08'),
('Verne', 'Jules', '1828-02-08', '1905-03-24'),
('Proust', 'Marcel', '1871-07-10', '1922-11-18'),
('Maupassant', 'Guy de', '1850-08-05', '1893-07-06'),
('Rimbaud', 'Arthur', '1854-10-20', '1891-11-10'),
('Baudelaire', 'Charles', '1821-04-09', '1867-08-31'),
('Sartre', 'Jean-Paul', '1905-06-21', '1980-04-15'),
('Camus', 'Albert', '1913-11-07', '1960-01-04'),
('Voltaire', NULL, '1694-11-21', '1778-05-30'),
('Diderot', 'Denis', '1713-10-05', '1784-07-31'),
('Rousseau', 'Jean-Jacques', '1712-06-28', '1778-07-02'),
('Molière', NULL, '1622-01-15', '1673-02-17'),
('Racine', 'Jean', '1639-12-22', '1699-04-21'),
('Corneille', 'Pierre', '1606-06-06', '1684-10-01'),
('La Fontaine', 'Jean de', '1621-07-08', '1695-04-13'),
('Stendhal', NULL, '1783-01-23', '1842-03-23'),
('Hemingway', 'Ernest', '1899-07-21', '1961-07-02'),
('Fitzgerald', 'F. Scott', '1896-09-24', '1940-12-21'),
('Orwell', 'George', '1903-06-25', '1950-01-21'),
('Tolkien', 'J.R.R.', '1892-01-03', '1973-09-02'),
('Austen', 'Jane', '1775-12-16', '1817-07-18'),
('Rowling', 'J.K.', '1965-07-31', NULL),
('Brown', 'Dan', '1964-06-22', NULL),
('Collins', 'Suzanne', '1962-08-10', NULL),
('Gaiman', 'Neil', '1960-11-10', NULL),
('King', 'Stephen', '1947-09-21', NULL),
('Marcelo', 'Mosca', NULL, NULL),
('Sienkiewicz', 'Henryk', '1846-05-05', '1916-11-15');


-- Insertions des editeurs dans la base de données --

INSERT INTO Editeur (nom_editeur) VALUES
('Chilton Books'),
('Gallimard'),
('Barzoi Book'),
('Penguin Books'),
('Levy & Freres'),
('Hetzel'),
('Grasset'),
('Charpentier'),
('Baudouin'),
('Editions de Minuit'),
('Fayard'),
('Albin Michel'),
('Garnier'),
('Gallimard'),
('Lemerre'),
('Aubier'),
('Le Seuil'),
('Folio'),
('Denoel'),
('Flammarion'),
('Actes Sud'),
('Gallimard'),
('Le Masque'),
('J\'ai Lu'),
('Pocket'),
('Fleuve Noir'),
('Ballantine Books'),
('Scribner'),
('Little, Brown and Company'),
('Scholastic'),
('Metro-Goldwyn-Mayer'),
('Warner Bros. Pictures'),
('Berkley Books'),
('HarperCollins'),
('J\'ai Lu'),
('Ballantine Books'),
('Wydawnictwo Literackie'),
('Rebis'),
('Wydawnictwo Znak'),
('SuperNowa'),
('Gollancz'),
('Chłopiec z Krainy Kwiatów'),
('Gliwicki Teatr Muzyczny'),
('Editions de Seuil'),
('Polish Radio'),
('HarperCollins'),
('Éditions Rombaldi'),
('Mondadori'),
('Simon & Schuster'),
('Corgi'),
('Blanvalet'),
('Ammann Verlag'),
('Kiepenheuer & Witsch'),
('Rapp & Carroll'),
('Editions Pol'),
('Adam Mickiewicz Institute'),
('Henry Holt and Company');



-- Insertions des livres dans la base de données --

INSERT INTO Livre (nom_livre, date_de_publication, genre, id_editeur) VALUES
('Dune', '1965-06-01', 'Science-fiction', 1),
('Le Messie de Dune', '1969-10-15', 'Science-fiction', 1),
('Les Enfants de Dune', '1976-04-21', 'Science-fiction', 1),
('L\'Empereur-Dieu de Dune', '1981-05-28', 'Science-fiction', 1),
('Les Hérétiques de Dune', '1984-10-09', 'Science-fiction', 1),
('La Maison des mères', '1985-03-17', 'Science-fiction', 1),
('Les Misérables', '1862-03-15', 'Roman historique', 2),
('Notre-Dame de Paris', '1831-01-14', 'Roman historique', 2),
('Les Trois Mousquetaires', '1844-03-14', 'Roman d\'aventure', 2),
('Germinal', '1885-11-26', 'Roman réaliste', 2),
('Madame Bovary', '1857-01-01', 'Roman réaliste', 2),
('Voyage au centre de la Terre', '1864-11-25', 'Science-fiction', 2),
('À la recherche du temps perdu', '1913-11-14', 'Roman', 2),
('Bel-Ami', '1885-04-24', 'Roman réaliste', 2),
('Une saison en enfer', '1873-05-15', 'Poésie', 2),
('Les Fleurs du mal', '1857-06-25', 'Poésie', 2),
('Les Mains sales', '1948-04-02', 'Théâtre', 2),
('L\'Étranger', '1942-06-01', 'Roman philosophique', 2),
('Candide', '1759-01-01', 'Roman philosophique', 2),
('Encyclopédie ou Dictionnaire raisonné des sciences, des arts et des métiers', '1751-01-01', 'Encyclopédie', 2),
('Du contrat social', '1762-01-01', 'Philosophie politique', 2),
('Tartuffe', '1664-05-05', 'Comédie', 2),
('Phèdre', '1677-01-01', 'Tragédie', 2),
('Le Cid', '1637-01-01', 'Tragédie', 2),
('Les Fables', '1668-01-01', 'Poésie', 2),
('Le Rouge et le Noir', '1830-11-13', 'Roman psychologique', 2),
('Le Vieil Homme et la Mer', '1952-09-01', 'Roman', 2),
('Gatsby le Magnifique', '1925-04-10', 'Roman', 2),
('1984', '1949-06-08', 'Science-fiction', 2),
('Le Hobbit', '1937-09-21', 'Fantasy', 2),
('Orgueil et Préjugés', '1813-01-28', 'Romance', 2),
('Harry Potter à l\'école des sorciers', '1997-06-26', 'Fantasy', 2),
('Da Vinci Code', '2003-03-18', 'Thriller', 2),
('Anges et Démons', '2000-05-05', 'Thriller', 2),
('Le Symbole perdu', '2009-09-15', 'Thriller', 2),
('Hunger Games', '2008-09-14', 'Science-fiction', 2),
('Twilight', '2005-10-05', 'Fantasy romantique', 2),
('American Gods', '2001-06-19', 'Fantasy', 2),
('Neverwhere', '1996-09-16', 'Fantasy', 2),
('Good Omens', '1990-05-01', 'Fantasy', 2),
('Le Client', '1993-03-01', 'Thriller', 2),
('La Firme', '1991-02-01', 'Thriller', 2),
('Le Testament', '1999-01-01', 'Thriller', 2),
('Misery', '1987-06-08', 'Thriller psychologique', 2),
('Le Corps', '1982-06-01', 'Thriller', 2),
('Carrie', '1974-04-05', 'Horreur', 2),
('Shining', '1977-01-28', 'Horreur', 2),
('Pet Sematary', '1983-11-14', 'Horreur', 2),
('Le Fléau', '1978-09-15', 'Science-fiction', 2),
('Le Pistolero', '1982-06-10', 'Fantasy', 2),
('Les Rêveurs', '1992-08-20', 'Roman', 2),
('Métro 2033', '2005-06-01', 'Science-fiction', 2),
('The Witcher: Le Dernier Vœu', '1993-06-01', 'Fantasy', 2),
('La Tour sombre: La Clé des vents', '2012-06-01', 'Fantasy', 2),
('Le Père Goriot', '1835-11-01', 'Roman réaliste', 2),
('Les Illusions perdues', '1843-02-01', 'Roman réaliste', 2),
('Les Liaisons dangereuses', '1782-07-23', 'Épistolaire', 2),
('La Chartreuse de Parme', '1839-03-01', 'Roman', 2),
('Le Médecin malgré lui', '1666-06-06', 'Comédie', 2),
('L\'Avare', '1668-09-09', 'Comédie', 2),
('Cyrano de Bergerac', '1897-12-28', 'Comédie', 2),
('L\'École des femmes', '1662-03-26', 'Comédie', 2),
('Les Fausses Confidences', '1737-03-16', 'Comédie', 2);



-- Insertions des ecrits dans la base de données --

INSERT INTO ecrit (id_auteur, id_livre) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 7),
(2, 8),
(3, 9),
(4, 10),
(5, 11),
(6, 12),
(7, 13),
(8, 14),
(9, 15),
(10, 16),
(11, 17),
(12, 18),
(13, 19),
(14, 20),
(15, 21),
(16, 22),
(17, 23),
(18, 24),
(19, 25),
(20, 26),
(20, 27),
(20, 28),
(20, 29),
(20, 30),
(20, 31),
(20, 32),
(21, 33),
(21, 34),
(21, 35),
(21, 36),
(21, 37),
(21, 38),
(21, 39),
(22, 40),
(22, 41),
(22, 42),
(23, 43),
(23, 44),
(23, 45),
(24, 46),
(24, 47),
(24, 48),
(24, 49),
(24, 50);



-- Insertions des utilisateurs dans la base de données --

INSERT INTO Utilisateur (nom_utilisateur, prenom_utilisateur, email, mot_de_passe, date_inscription) VALUES
('Dupont', 'Jean', 'jean.dupont@gmail.com', 'password1', '2023-01-01'),
('Martin', 'Marie', 'marie.martin@hotmail.com', 'password2', '2023-01-02'),
('Bernard', 'Pierre', 'pierre.bernard@outlook.com', 'password3', '2023-01-03'),
('Dubois', 'Paul', 'paul.dubois@gmail.com', 'password4', '2023-01-04'),
('Durand', 'Lucie', 'lucie.durand@hotmail.com', 'password5', '2023-01-05'),
('Lefevre', 'Julie', 'julie.lefevre@outlook.com', 'password6', '2023-01-06'),
('Leroy', 'Louis', 'louis.leroy@gmail.com', 'password7', '2023-01-07'),
('Moreau', 'Nathalie', 'nathalie.moreau@hotmail.com', 'password8', '2023-01-08'),
('Simon', 'Alain', 'alain.simon@gmail.com', 'password9', '2023-01-09'),
('Laurent', 'Sophie', 'sophie.laurent@outlook.com', 'password10', '2023-01-10'),
('Michel', 'Emilie', 'emilie.michel@gmail.com', 'password11', '2023-01-11'),
('Garcia', 'Jacques', 'jacques.garcia@hotmail.com', 'password12', '2023-01-12'),
('David', 'Sarah', 'sarah.david@gmail.com', 'password13', '2023-01-13'),
('Bertrand', 'Philippe', 'philippe.bertrand@outlook.com', 'password14', '2023-01-14'),
('Roux', 'Catherine', 'catherine.roux@gmail.com', 'password15', '2023-01-15'),
('Vincent', 'Antoine', 'antoine.vincent@hotmail.com', 'password16', '2023-01-16'),
('Fournier', 'Isabelle', 'isabelle.fournier@gmail.com', 'password17', '2023-01-17'),
('Morel', 'Thierry', 'thierry.morel@outlook.com', 'password18', '2023-01-18'),
('Girard', 'Christine', 'christine.girard@gmail.com', 'password19', '2023-01-19'),
('Andre', 'Bruno', 'bruno.andre@hotmail.com', 'password20', '2023-01-20'),
('Legrand', 'Patricia', 'patricia.legrand@gmail.com', 'password21', '2023-01-21'),
('Gautier', 'Julien', 'julien.gautier@outlook.com', 'password22', '2023-01-22'),
('Roche', 'Mireille', 'mireille.roche@gmail.com', 'password23', '2023-01-23'),
('Roy', 'Henri', 'henri.roy@hotmail.com', 'password24', '2023-01-24'),
('Noel', 'Laurence', 'laurence.noel@gmail.com', 'password25', '2023-01-25'),
('Meyer', 'Bernadette', 'bernadette.meyer@outlook.com', 'password26', '2023-01-26'),
('Lucas', 'Olivier', 'olivier.lucas@gmail.com', 'password27', '2023-01-27'),
('Henry', 'Elisabeth', 'elisabeth.henry@hotmail.com', 'password28', '2023-01-28'),
('Perrin', 'Patrick', 'patrick.perrin@gmail.com', 'password29', '2023-01-29'),
('Morin', 'Claire', 'claire.morin@outlook.com', 'password30', '2023-01-30'),
('Blanc', 'Vincent', 'vincent.blanc@gmail.com', 'password31', '2023-01-31'),
('Guerin', 'Françoise', 'francoise.guerin@hotmail.com', 'password32', '2023-02-01'),
('Boyer', 'Yves', 'yves.boyer@gmail.com', 'password33', '2023-02-02'),
('Garnier', 'Helene', 'helene.garnier@outlook.com', 'password34', '2023-02-03'),
('Chevalier', 'Nicolas', 'nicolas.chevalier@gmail.com', 'password35', '2023-02-04'),
('Francois', 'Veronique', 'veronique.francois@hotmail.com', 'password36', '2023-02-05'),
('Muller', 'Daniel', 'daniel.muller@gmail.com', 'password37', '2023-02-06'),
('Leclerc', 'Sandrine', 'sandrine.leclerc@outlook.com', 'password38', '2023-02-07'),
('Lemoine', 'Dominique', 'dominique.lemoine@gmail.com', 'password39', '2023-02-08'),
('Jean', 'Lucas', 'lucas.jean@hotmail.com', 'password40', '2023-02-09'),
('Dupuis', 'Martine', 'martine.dupuis@gmail.com', 'password41', '2023-02-10'),
('Brun', 'Christophe', 'christophe.brun@outlook.com', 'password42', '2023-02-11'),
('Fischer', 'Valerie', 'valerie.fischer@gmail.com', 'password43', '2023-02-12'),
('Colin', 'Frederic', 'frederic.colin@hotmail.com', 'password44', '2023-02-13'),
('Mercier', 'Caroline', 'caroline.mercier@gmail.com', 'password45', '2023-02-14'),
('Lambert', 'Laurent', 'laurent.lambert@outlook.com', 'password46', '2023-02-15'),
('Caron', 'Geraldine', 'geraldine.caron@gmail.com', 'password47', '2023-02-16'),
('Breton', 'Gabriel', 'gabriel.breton@outlook.com', 'password48', '2023-02-17'),
('Delacroix', 'Charlotte', 'charlotte.delacroix@gmail.com', 'password49', '2023-02-18'),
('Barbier', 'Herve', 'herve.barbier@hotmail.com', 'password50', '2023-02-19');



-- Insertions des amis dans la base de données --
INSERT INTO ami (id_utilisateur1, id_utilisateur2) VALUES
(18, 2),
(1, 5),
(3, 23),
(6, 2),
(1, 8),
(9, 10),
(11, 12),
(13, 14),
(15, 16),
(17, 18),
(1, 20),
(21, 22),
(36, 28),
(25, 26),
(27, 50),
(29, 30),
(31, 22),
(33, 3),
(35, 36),
(17, 39),
(39, 40),
(41, 42),
(4, 44),
(45, 46),
(7, 40),
(49, 5);


-- Insertions des avis dans la base de données --

-- Avis pour le livre "Dune" (ID = 1) --
INSERT INTO Avis (note, commentaire, date_avis, id_livre, id_utilisateur) VALUES
(5, 'Un chef-d\'œuvre de la littérature, impossible de le lâcher une fois commencé !', '2023-01-01', 1, 1),
(4, 'Une lecture très plaisante, mais quelques longueurs par moments.', '2023-01-02', 1, 2),
(5, 'Dune est un classique de la science-fiction, à lire absolument.', '2023-01-03', 1, 3);

-- Avis pour le livre "Le Messie de Dune" (ID = 2) --
(4, 'Une suite honorable, mais moins captivante que le premier tome.', '2023-01-04', 2, 4),
(5, 'Les Enfants de Dune sont une lecture captivante du début à la fin.', '2023-01-05', 2, 5),
(2, 'J\'ai eu du mal à accrocher avec ce livre, trop de personnages et d\'intrigues à suivre.', '2023-01-06', 2, 6);

-- Avis pour le livre "Les Enfants de Dune" (ID = 3) --
(5, 'Un monument de la littérature française, à dévorer sans modération !', '2023-01-07', 3, 7),
(4, 'Un roman historique passionnant, mais parfois un peu dense.', '2023-01-08', 3, 8),
(5, 'Les Trois Mousquetaires est un classique de l\'aventure, à lire et à relire !', '2023-01-09', 3, 9);

-- Avis pour le livre "L'Empereur-Dieu de Dune" (ID = 4) --
(3, 'Un roman réaliste qui décrit avec justesse la condition ouvrière, mais un peu trop sombre à mon goût.', '2023-01-10', 4, 10),
(5, 'Madame Bovary est un chef-d\'œuvre incontournable de la littérature française.', '2023-01-11', 4, 11),
(4, 'Une aventure palpitante au cœur de la Terre, un vrai régal !', '2023-01-12', 4, 12);

-- Avis pour le livre "Les Hérétiques de Dune" (ID = 5) --
(5, 'À la recherche du temps perdu est une œuvre magistrale, à savourer lentement.', '2023-01-13', 5, 13),
(4, 'Une satire sociale brillamment écrite, mais parfois un peu lente.', '2023-01-14', 5, 14),
(5, 'Les Fleurs du mal sont un recueil de poésie d\'une beauté sombre et envoûtante.', '2023-01-15', 5, 15);

-- Avis pour le livre "La Maison des mères" (ID = 6) --
(3, 'Un texte engagé et percutant, mais difficile d\'accès pour les non-initiés.', '2023-01-16', 6, 16),
(5, 'Candide est une œuvre philosophique majeure, à lire et à relire !', '2023-01-17', 6, 17),
(4, 'Une encyclopédie qui a marqué son époque, malgré quelques lacunes.', '2023-01-18', 6, 18);

-- Avis pour le livre "Les Misérables" (ID = 7) --
(5, 'Un chef-d\'œuvre absolu, une fresque humaine inoubliable !', '2023-01-19', 7, 19),
(4, 'Les Misérables est un roman dense mais incroyablement gratifiant.', '2023-01-20', 7, 20),
(5, 'Une lecture inoubliable, un monument de la littérature !', '2023-01-21', 7, 21);

-- Avis pour le livre "Notre-Dame de Paris" (ID = 8) --
(4, 'Un classique de la littérature française, à découvrir ou redécouvrir !', '2023-01-22', 8, 22),
(3, 'Notre-Dame de Paris est un roman intéressant mais parfois un peu daté.', '2023-01-23', 8, 23),
(5, 'Une histoire captivante dans un Paris médiéval magnifiquement décrit.', '2023-01-24', 8, 24);

-- Avis pour le livre "Les Trois Mousquetaires" (ID = 9) --
(5, 'Un roman d\'aventure palpitant, plein de rebondissements et d\'humour !', '2023-01-25', 9, 25),
(4, 'Les Trois Mousquetaires est un classique indémodable, à lire sans hésitation.', '2023-01-26', 9, 26),
(5, 'Une épopée épique et enlevante, un plaisir de lecture à chaque page !', '2023-01-27', 9, 27);

-- Avis pour le livre "Germinal" (ID = 10) --
(4, 'Un roman réaliste poignant, une plongée brutale dans le monde ouvrier.', '2023-01-28', 10, 28),
(3, 'Germinal est un livre important mais parfois difficile à lire en raison de sa noirceur.', '2023-01-29', 10, 29),
(5, 'Une œuvre magistrale qui dépeint avec réalisme la condition des mineurs.', '2023-01-30', 10, 30);

-- Avis pour le livre "Madame Bovary" (ID = 11) --
(5, 'Un roman réalistement tragique, une plongée au cœur des passions humaines.', '2023-01-31', 11, 31),
(4, 'Madame Bovary est un classique incontournable de la littérature française.', '2023-02-01', 11, 32),
(5, 'Une lecture envoûtante, une héroïne inoubliable.', '2023-02-02', 11, 33);

-- Avis pour le livre "Voyage au centre de la Terre" (ID = 12) --
(4, 'Un voyage fantastique au cœur de la Terre, une aventure inoubliable !', '2023-02-03', 12, 34),
(3, 'Voyage au centre de la Terre est un classique de la littérature, mais parfois un peu dépassé.', '2023-02-04', 12, 35),
(5, 'Une aventure captivante qui stimule l\'imagination, à lire en famille !', '2023-02-05', 12, 36);

-- Avis pour le livre "À la recherche du temps perdu" (ID = 13) --
(5, 'Une œuvre magistrale, une exploration profonde de la mémoire et du temps.', '2023-02-06', 13, 37),
(4, 'À la recherche du temps perdu est une expérience de lecture unique et enrichissante.', '2023-02-07', 13, 38),
(5, 'Une immersion totale dans un monde de souvenirs et de réflexions.', '2023-02-08', 13, 39);

-- Avis pour le livre "Bel-Ami" (ID = 14) --
(4, 'Un portrait saisissant de la société parisienne de la Belle Époque.', '2023-02-09', 14, 40),
(3, 'Bel-Ami est un roman intéressant mais parfois difficile d\'accès.', '2023-02-10', 14, 41),
(5, 'Une ascension sociale haletante, un personnage ambigu et fascinant.', '2023-02-11', 14, 42);

-- Avis pour le livre "Une saison en enfer" (ID = 15) --
(3, 'Une œuvre poétique puissante mais parfois hermétique.', '2023-02-12', 15, 43),
(4, 'Une descente aux enfers poétique et saisissante.', '2023-02-13', 15, 44),
(2, 'J\'ai eu du mal à comprendre cette œuvre, elle m\'a semblé confuse et décousue.', '2023-02-14', 15, 45);

-- Avis pour le livre "Les Fleurs du mal" (ID = 16) --
(5, 'Une œuvre poétique d\'une beauté troublante, à lire et à relire.', '2023-02-17', 16, 48),
(4, 'Baudelaire nous entraîne dans un tourbillon d\'émotions avec Les Fleurs du mal.', '2023-02-18', 16, 49),
(5, 'Un chef-d\'œuvre intemporel, une source d\'inspiration pour les générations futures.', '2023-02-19', 16, 50);

-- Avis pour le livre "Les Mains sales" (ID = 17) --
(4, 'Une pièce de théâtre captivante qui interroge sur la responsabilité politique.', '2023-02-20', 17, 19),
(3, 'Les Mains sales est une pièce intéressante mais parfois un peu verbeuse.', '2023-02-21', 17, 15),
(5, 'Un drame politique intense, une réflexion profonde sur l\'engagement.', '2023-02-22', 17, 5);

-- Avis pour le livre "L'Étranger" (ID = 18) --
(5, 'Un roman existentialiste puissant, une méditation sur l\'absurdité de l\'existence.', '2023-02-23', 18, 5),
(4, 'L\'Étranger est un classique de la littérature française, à la fois troublant et fascinant.', '2023-02-24', 18, 5),
(5, 'Une exploration profonde de l\'aliénation et de la solitude.', '2023-02-25', 18, 5);

-- Avis pour le livre "Candide" (ID = 19) --
(5, 'Un conte philosophique plein d\'humour et d\'ironie, une satire brillante de la société.', '2023-02-26', 19, 57),
(4, 'Candide est une lecture divertissante et instructive, à ne pas manquer !', '2023-02-27', 19, 8),
(5, 'Une leçon d\'optimisme à travers les aventures rocambolesques de Candide.', '2023-02-28', 19, 50);

-- Avis pour le livre "Encyclopédie ou Dictionnaire raisonné des sciences, des arts et des métiers" (ID = 20) --
(4, 'Une œuvre monumentale qui a marqué l\'histoire de la pensée et du savoir.', '2023-03-01', 20, 6),
(5, 'L\'Encyclopédie est une source inépuisable de connaissances et de réflexions.', '2023-03-02', 20, 4),
(4, 'Un ouvrage indispensable pour quiconque s\'intéresse à l\'histoire des idées.', '2023-03-03', 20, 42);

-- Avis pour le livre "Du contrat social" (ID = 21) --
(5, 'Un traité politique majeur, une référence incontournable pour comprendre la démocratie.', '2023-03-04', 21, 33),
(4, 'Du contrat social est une œuvre essentielle pour penser les fondements de la société.', '2023-03-05', 21, 34),
(5, 'Une analyse brillante des rapports entre l\'individu et la société.', '2023-03-06', 21, 35);

-- Avis pour le livre "Tartuffe" (ID = 22) --
(4, 'Une comédie satirique classique, une critique acerbe de l\'hypocrisie religieuse.', '2023-03-07', 22, 6),
(3, 'Tartuffe est une pièce intéressante mais parfois un peu moralisatrice.', '2023-03-08', 22, 37),
(5, 'Un chef-d\'œuvre de Molière qui conserve toute sa pertinence aujourd\'hui.', '2023-03-09', 22, 38);

-- Avis pour le livre "Phèdre" (ID = 23) --
(5, 'Une tragédie classique d\'une intensité dramatique rare, un chef-d\'œuvre absolu !', '2023-03-10', 23, 19),
(4, 'Phèdre est une œuvre puissante et poignante, à lire et à relire.', '2023-03-11', 23, 7),
(5, 'Une exploration profonde des passions humaines et de la fatalité.', '2023-03-12', 23, 1);

-- Avis pour le livre "Le Cid" (ID = 24) --
(4, 'Un classique du théâtre français, une tragédie passionnée et grandiose.', '2023-03-13', 24, 32),
(3, 'Le Cid est une pièce intéressante mais parfois un peu rigide dans sa structure.', '2023-03-14', 24, 23),
(5, 'Une histoire d\'amour et d\'honneur d\'une grande beauté, un incontournable de Corneille.', '2023-03-15', 24, 44);

-- Avis pour le livre "Les Fables" (ID = 25) --
(5, 'Des fables intemporelles, des leçons de vie universelles, un pur délice de lecture !', '2023-03-16', 25, 5),
(4, 'Les Fables de La Fontaine restent une source inépuisable de sagesse et d\'enseignement.', '2023-03-17', 25, 46),
(5, 'Des histoires simples et profondes à la fois, à savourer à tout âge.', '2023-03-18', 25, 37);

-- Avis pour le livre "Le Rouge et le Noir" (ID = 26) --
(5, 'Un roman psychologique brillant, une analyse fine des ambitions humaines.', '2023-03-19', 26, 18),
(4, 'Le Rouge et le Noir est un classique de la littérature française, à lire absolument.', '2023-03-20', 26, 19),
(5, 'Une exploration passionnante des désirs et des frustrations de la jeunesse.', '2023-03-21', 26, 18);

-- Avis pour le livre "Le Vieil Homme et la Mer" (ID = 27) --
(4, 'Une parabole sur le courage et la résilience, une ode à la persévérance.', '2023-03-22', 27, 11),
(3, 'Le Vieil Homme et la Mer est une lecture enrichissante mais parfois un peu lente.', '2023-03-23', 27, 12),
(5, 'Une histoire émouvante et universelle, portée par la force de l\'écriture d\'Hemingway.', '2023-03-24', 27, 13);

-- Avis pour le livre "Gatsby le Magnifique" (ID = 28) --
(5, 'Un portrait saisissant de l\'Amérique des années folles, un roman inoubliable !', '2023-03-25', 28, 24),
(4, 'Gatsby le Magnifique est un chef-d\'œuvre de la littérature américaine.', '2023-03-26', 28, 25),
(5, 'Une plongée fascinante dans l\'illusion du rêve américain, à la fois sombre et captivante.', '2023-03-27', 28, 26);

-- Avis pour le livre "1984" (ID = 29) --
(5, 'Un roman visionnaire et terrifiant, une critique acerbe des totalitarismes.', '2023-03-28', 29, 47),
(4, '1984 est un livre essentiel qui résonne encore aujourd\'hui avec une pertinence troublante.', '2023-03-29', 29, 48),
(5, 'Une lecture indispensable pour comprendre les enjeux de notre époque.', '2023-03-30', 29, 49);

-- Avis pour le livre "Le Hobbit" (ID = 30) --
(5, 'Une aventure épique et merveilleuse, un classique de la littérature fantasy !', '2023-03-31', 30, 12),
(4, 'Le Hobbit est une lecture captivante, pleine de magie et d\'aventure.', '2023-04-01', 30, 1),
(5, 'Une histoire intemporelle qui nous emporte loin de notre quotidien.', '2023-04-02', 30, 2);

-- Avis pour le livre "Orgueil et Préjugés" (ID = 31) --
(5, 'Un chef-d\'œuvre de la littérature romantique, une histoire d\'amour inoubliable !', '2023-04-03', 31, 3),
(4, 'Orgueil et Préjugés est un roman captivant, plein de rebondissements et d\'émotions.', '2023-04-04', 31, 9),
(5, 'Une satire sociale subtile et une romance délicieusement passionnée.', '2023-04-05', 31, 5);

-- Avis pour le livre "Harry Potter à l'école des sorciers" (ID = 32) --
(5, 'Une entrée magique dans l\'univers envoûtant de Harry Potter, un récit captivant !', '2023-04-06', 32, 6),
(4, 'Harry Potter à l\'école des sorciers est un livre qui ravira les petits comme les grands.', '2023-04-07', 32, 7),
(5, 'Une saga épique et merveilleuse, un incontournable de la littérature jeunesse.', '2023-04-08', 32, 8);

-- Avis pour le livre "Da Vinci Code" (ID = 33) --
(4, 'Un thriller palpitant, une intrigue complexe et captivante !', '2023-04-09', 33, 9),
(3, 'Le Da Vinci Code est un roman divertissant mais parfois un peu tiré par les cheveux.', '2023-04-10', 33, 1),
(5, 'Un voyage haletant à travers l\'histoire de l\'art et les mystères du Vatican.', '2023-04-11', 33, 11);

-- Avis pour le livre "Anges et Démons" (ID = 34) --
(5, 'Un thriller palpitant, une course contre la montre haletante et captivante !', '2023-04-12', 34, 12),
(4, 'Anges et Démons est un roman riche en rebondissements et en suspense.', '2023-04-13', 34, 10),
(5, 'Une intrigue captivante qui nous plonge dans les arcanes du Vatican et de la science, un page-turner captivant !', '2023-04-14', 34, 1);

-- Avis pour le livre "Le Symbole perdu" (ID = 35) --
(4, 'Une chasse au trésor passionnante, une intrigue pleine de mystères ésotériques !', '2023-04-15', 35, 15),
(3, 'Le Symbole perdu est un thriller divertissant mais parfois un peu trop complexe.', '2023-04-16', 35, 16),
(5, 'Une plongée fascinante dans les mystères de la franc-maçonnerie et de Washington D.C.', '2023-04-17', 35, 10);

-- Avis pour le livre "Hunger Games" (ID = 36) --
(5, 'Un récit dystopique intense, une critique percutante de la société et des médias !', '2023-04-18', 36, 8),
(4, 'Hunger Games est un roman haletant, porté par une héroïne courageuse et déterminée.', '2023-04-19', 36, 19),
(5, 'Une saga captivante qui nous confronte aux pires travers de l\'humanité.', '2023-04-20', 36, 10);

-- Avis pour le livre "Twilight" (ID = 37) --
(4, 'Une romance surnaturelle envoûtante, une histoire d\'amour interdite captivante !', '2023-04-21', 37, 11),
(3, 'Twilight est un roman divertissant mais parfois un peu trop centré sur la romance.', '2023-04-22', 37, 12),
(5, 'Une saga envoûtante qui mêle romance, suspense et créatures surnaturelles.', '2023-04-23', 37, 13);

-- Avis pour le livre "American Gods" (ID = 38) --
(5, 'Un voyage épique au cœur des mythes américains, une lecture envoûtante !', '2023-04-24', 38, 14),
(4, 'American Gods est un roman original et captivant qui mêle mythologie et modernité.', '2023-04-25', 38, 15),
(5, 'Une exploration fascinante des croyances et des légendes qui façonnent l\'Amérique.', '2023-04-26', 38, 16);

-- Avis pour le livre "Neverwhere" (ID = 39) --
(4, 'Un voyage onirique et sombre dans les méandres de Londres souterraine.', '2023-04-27', 39, 17),
(3, 'Neverwhere est un roman original mais parfois un peu confus dans son récit.', '2023-04-28', 39, 18),
(5, 'Une plongée envoûtante dans un monde fantastique et urbain, plein de mystères et de dangers.', '2023-04-29', 39, 19);

-- Avis pour le livre "Good Omens" (ID = 40) --
(5, 'Une comédie divine, une collaboration hilarante entre Gaiman et Pratchett !', '2023-04-30', 40, 20),
(4, 'Good Omens est un roman drôle et intelligent, qui offre une vision décalée de l\'Apocalypse.', '2023-05-01', 40, 21),
(5, 'Un délice d\'humour et d\'imagination, à savourer sans modération !', '2023-05-02', 40, 22);

-- Avis pour le livre "Le Client" (ID = 41) --
(4, 'Un thriller juridique captivant, une histoire de suspense et de conspiration !', '2023-05-03', 41, 23),
(3, 'Le Client est un roman divertissant mais parfois un peu prévisible dans ses rebondissements.', '2023-05-04', 41, 24),
(5, 'Un page-turner palpitant, qui nous plonge au cœur des machinations du pouvoir.', '2023-05-05', 41, 25);

-- Avis pour le livre "La Firme" (ID = 42) --
(5, 'Un thriller implacable, une plongée vertigineuse dans les arcanes du pouvoir et de la corruption !', '2023-05-06', 42, 26),
(4, 'La Firme est un roman haletant qui nous tient en haleine jusqu\'à la dernière page.', '2023-05-07', 42, 27),
(5, 'Une intrigue captivante, des rebondissements à couper le souffle, un régal de lecture !', '2023-05-08', 42, 28);

-- Avis pour le livre "Le Testament" (ID = 43) --
(4, 'Un thriller juridique palpitant, une course contre la montre haletante !', '2023-05-09', 43, 29),
(3, 'Le Testament est un roman divertissant mais parfois un peu trop prévisible.', '2023-05-10', 43, 30),
(5, 'Une intrigue bien ficelée, des personnages complexes, un excellent moment de lecture !', '2023-05-11', 43, 31);

-- Avis pour le livre "Misery" (ID = 44) --
(5, 'Un thriller psychologique glaçant, une plongée terrifiante dans a folie d\'une fan obsessionnelle !', '2023-05-12', 44, 32),
(4, 'Misery est un roman captivant qui maintient le suspense jusqu\'à la dernière page.', '2023-05-13', 44, 33),
(5, 'Une tension insoutenable, un huis clos oppressant, un chef-d\'œuvre du genre !', '2023-05-14', 44, 34);

-- Avis pour le livre "Carrie" (ID = 45) --
(4, 'Un roman d\'horreur emblématique, une plongée dans les ténèbres de l\'adolescence !', '2023-05-15', 45, 35),
(3, 'Carrie est un livre qui a marqué le genre mais parfois un peu daté dans son traitement.', '2023-05-16', 45, 36),
(5, 'Une histoire poignante et terrifiante, une exploration des pouvoirs psychiques et de l\'isolement.', '2023-05-17', 45, 37);

-- Avis pour le livre "Shining" (ID = 46) --
(5, 'Un classique de l\'horreur, une plongée angoissante dans les méandres de l\'esprit humain !', '2023-05-18', 46, 38),
(4, 'Shining est un roman glaçant qui hante durablement l\'esprit du lecteur.', '2023-05-19', 46, 39),
(5, 'Une tension permanente, une atmosphère oppressante, un incontournable du genre !', '2023-05-20', 46, 40);

-- Avis pour le livre "Ca" (ID = 47) --
(5, 'Un chef-d\'œuvre de l\'horreur, une fresque terrifiante qui explore les peurs enfantines !', '2023-05-21', 47, 11),
(4, 'Ca est un roman captivant qui mêle horreur, suspense et émotion avec brio.', '2023-05-22', 47, 12),
(5, 'Une plongée dans les ténèbres de l\'enfance, une histoire inoubliable et bouleversante !', '2023-05-23', 47, 13);

-- Avis pour le livre "Simetierre" (ID = 48) --
(4, 'Un thriller horrifique saisissant, une exploration des tabous et des peurs les plus profondes !', '2023-05-24', 48, 14),
(3, 'Simetierre est un roman troublant mais parfois un peu exagéré dans son traitement.', '2023-05-25', 48, 12),
(5, 'Une atmosphère oppressante, des frissons garantis, un incontournable du genre !', '2023-05-26', 48, 16);

-- Avis pour le livre "Misery" (ID = 49) --
(5, 'Un thriller psychologique glaçant, une plongée terrifiante dans la folie d\'une fan obsessionnelle !', '2023-05-27', 49, 17),
(4, 'Misery est un roman captivant qui maintient le suspense jusqu\'à la dernière page.', '2023-05-28', 49, 14),
(5, 'Une tension insoutenable, un huis clos oppressant, un chef-d\'œuvre du genre !', '2023-05-29', 49, 19);

-- Avis pour le livre "Carrie" (ID = 50) --
(4, 'Un roman d\'horreur emblématique, une plongée dans les ténèbres de l\'adolescence !', '2023-05-30', 50, 10),
(3, 'Carrie est un livre qui a marqué le genre mais parfois un peu daté dans son traitement.', '2023-05-31', 50, 11),
(5, 'Une histoire poignante et terrifiante, une exploration des pouvoirs psychiques et de l\'isolement.', '2023-06-01', 50, 12);

-- Avis pour le livre "Shining" (ID = 51) --
(5, 'Un classique de l\'horreur, une plongée angoissante dans les méandres de l\'esprit humain !', '2023-06-02', 51, 13),
(4, 'Shining est un roman glaçant qui hante durablement l\'esprit du lecteur.', '2023-06-03', 51, 15),
(5, 'Une tension permanente, une atmosphère oppressante, un incontournable du genre !', '2023-06-04', 51, 15);
