# Inscription des stagiaires

Application de formation en PHP, MySQL, JavaScript et Cloudinary.

## Pages

- Présentation : `/projects/atelier-stagiaires/overview.html`
- Formulaire : `/atelier-stagiaires/index.html`
- Liste : `/atelier-stagiaires/liste.html`

Le site principal est servi par `api/index.php`. Les appels du formulaire et de la liste passent par les chemins publics `/inscrire-stagiaire.php` et `/liste-stagiaires.php`, redirigés vers les fonctions du dossier `api/` dans `vercel.json`.

## Configuration nécessaire

Sur Vercel (Project > Settings > Environment Variables), renseigner les variables **côté serveur** :

- `DB_HOST`
- `DB_PORT`
- `DB_NAME`
- `DB_USER`
- `DB_PASSWORD`
- `CLOUDINARY_URL`

Ne jamais publier les valeurs, mots de passe ou jetons dans GitHub.

Créer la table dans la base MySQL :

```sql
CREATE TABLE IF NOT EXISTS stagiaires (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(150) NOT NULL,
  prenom VARCHAR(150) NOT NULL,
  ville VARCHAR(150) NOT NULL,
  photo TEXT NOT NULL,
  date_inscription TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Installer les dépendances PHP avec `composer install` dans le dossier `projects/atelier-stagiaires/` lors d'une exécution locale. Le projet utilise l'autoload Composer dans ce dossier : s'assurer que `vendor/autoload.php` est présent dans l'environnement d'exécution Vercel. Le fichier `composer.json` existe également à la racine du dépôt, mais son installation ne crée pas automatiquement le dossier `projects/atelier-stagiaires/vendor`.

La configuration PDO utilise le certificat `projects/atelier-stagiaires/certs/ca.pem`. Vérifier sa compatibilité avec le fournisseur MySQL. Les photos acceptées sont JPG, PNG ou WebP, avec une limite de 4 Mo.

## Vérification

1. Ouvrir la page principale du portfolio.
2. Ouvrir la présentation du projet, puis le formulaire.
3. Vérifier les variables d'environnement et l'accès MySQL/Cloudinary avant de tester les insertions.
4. Tester une inscription avec une image de moins de 4 Mo, puis ouvrir la liste.

Si l'inscription ou la liste renvoie une erreur serveur, consulter les logs des fonctions Vercel et vérifier le chargement des dépendances et la connexion à la base.
