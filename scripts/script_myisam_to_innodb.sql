-- Sélectionner la base de données
USE livres_app;

-- Changer le moteur de stockage par défaut de la base de données
ALTER DATABASE livres_app DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Changer le moteur de stockage par défaut globalement
SET GLOBAL default_storage_engine = 'InnoDB';

-- Vérifier le moteur de stockage par défaut
SHOW VARIABLES LIKE 'default_storage_engine';
