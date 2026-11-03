-- Table utilisée par l'application d'inscription des stagiaires.
-- Importer ce fichier dans la base MySQL configurée dans les variables d'environnement.
CREATE TABLE IF NOT EXISTS stagiaires (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(150) NOT NULL,
  prenom VARCHAR(150) NOT NULL,
  ville VARCHAR(150) NOT NULL,
  photo TEXT NOT NULL,
  date_inscription TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
