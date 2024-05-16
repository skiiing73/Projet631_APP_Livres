
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
('Dupont', 'Jean', 'jean.dupont@example.com', 'password1', '2023-01-01'),
('Martin', 'Marie', 'marie.martin@example.com', 'password2', '2023-01-02'),
('Bernard', 'Pierre', 'pierre.bernard@example.com', 'password3', '2023-01-03'),
('Dubois', 'Paul', 'paul.dubois@example.com', 'password4', '2023-01-04'),
('Durand', 'Lucie', 'lucie.durand@example.com', 'password5', '2023-01-05'),
('Lefevre', 'Julie', 'julie.lefevre@example.com', 'password6', '2023-01-06'),
('Leroy', 'Louis', 'louis.leroy@example.com', 'password7', '2023-01-07'),
('Moreau', 'Nathalie', 'nathalie.moreau@example.com', 'password8', '2023-01-08'),
('Simon', 'Alain', 'alain.simon@example.com', 'password9', '2023-01-09'),
('Laurent', 'Sophie', 'sophie.laurent@example.com', 'password10', '2023-01-10'),
('Michel', 'Emilie', 'emilie.michel@example.com', 'password11', '2023-01-11'),
('Garcia', 'Jacques', 'jacques.garcia@example.com', 'password12', '2023-01-12'),
('David', 'Sarah', 'sarah.david@example.com', 'password13', '2023-01-13'),
('Bertrand', 'Philippe', 'philippe.bertrand@example.com', 'password14', '2023-01-14'),
('Roux', 'Catherine', 'catherine.roux@example.com', 'password15', '2023-01-15'),
('Vincent', 'Antoine', 'antoine.vincent@example.com', 'password16', '2023-01-16'),
('Fournier', 'Isabelle', 'isabelle.fournier@example.com', 'password17', '2023-01-17'),
('Morel', 'Thierry', 'thierry.morel@example.com', 'password18', '2023-01-18'),
('Girard', 'Christine', 'christine.girard@example.com', 'password19', '2023-01-19'),
('Andre', 'Bruno', 'bruno.andre@example.com', 'password20', '2023-01-20'),
('Legrand', 'Patricia', 'patricia.legrand@example.com', 'password21', '2023-01-21'),
('Gautier', 'Julien', 'julien.gautier@example.com', 'password22', '2023-01-22'),
('Roche', 'Mireille', 'mireille.roche@example.com', 'password23', '2023-01-23'),
('Roy', 'Henri', 'henri.roy@example.com', 'password24', '2023-01-24'),
('Noel', 'Laurence', 'laurence.noel@example.com', 'password25', '2023-01-25'),
('Meyer', 'Bernadette', 'bernadette.meyer@example.com', 'password26', '2023-01-26'),
('Lucas', 'Olivier', 'olivier.lucas@example.com', 'password27', '2023-01-27'),
('Henry', 'Elisabeth', 'elisabeth.henry@example.com', 'password28', '2023-01-28'),
('Perrin', 'Patrick', 'patrick.perrin@example.com', 'password29', '2023-01-29'),
('Morin', 'Claire', 'claire.morin@example.com', 'password30', '2023-01-30'),
('Blanc', 'Vincent', 'vincent.blanc@example.com', 'password31', '2023-01-31'),
('Guerin', 'Françoise', 'francoise.guerin@example.com', 'password32', '2023-02-01'),
('Boyer', 'Yves', 'yves.boyer@example.com', 'password33', '2023-02-02'),
('Garnier', 'Helene', 'helene.garnier@example.com', 'password34', '2023-02-03'),
('Chevalier', 'Nicolas', 'nicolas.chevalier@example.com', 'password35', '2023-02-04'),
('Francois', 'Veronique', 'veronique.francois@example.com', 'password36', '2023-02-05'),
('Muller', 'Daniel', 'daniel.muller@example.com', 'password37', '2023-02-06'),
('Leclerc', 'Sandrine', 'sandrine.leclerc@example.com', 'password38', '2023-02-07'),
('Lemoine', 'Dominique', 'dominique.lemoine@example.com', 'password39', '2023-02-08'),
('Jean', 'Lucas', 'lucas.jean@example.com', 'password40', '2023-02-09'),
('Dupuis', 'Martine', 'martine.dupuis@example.com', 'password41', '2023-02-10'),
('Brun', 'Christophe', 'christophe.brun@example.com', 'password42', '2023-02-11'),
('Fischer', 'Valerie', 'valerie.fischer@example.com', 'password43', '2023-02-12'),
('Colin', 'Frederic', 'frederic.colin@example.com', 'password44', '2023-02-13'),
('Mercier', 'Caroline', 'caroline.mercier@example.com', 'password45', '2023-02-14'),
('Lambert', 'Laurent', 'laurent.lambert@example.com', 'password46', '2023-02-15'),
('Caron', 'Geraldine', 'geraldine.caron@example.com', 'password47', '2023-02-16'),
('Breton', 'Gabriel', 'gabriel.breton@example.com', 'password48', '2023-02-17'),
('Delacroix', 'Charlotte', 'charlotte.delacroix@example.com', 'password49', '2023-02-18'),
('Barbier', 'Herve', 'herve.barbier@example.com', 'password50', '2023-02-19');