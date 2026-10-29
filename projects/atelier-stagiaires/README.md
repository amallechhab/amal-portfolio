# Atelier des stagiaires

A PHP and MySQL trainee registration app. It accepts trainee details and a photo, stores the record in MySQL, and uploads photos to Cloudinary. The app includes a registration form and a page that lists saved trainees.

## Deploying with the portfolio on Vercel

The portfolio repository is the Vercel project root. The live app is served at /atelier-stagiaires/index.html; PHP API functions are exposed through root API routes.

Before deploying, configure these Vercel Project Environment Variables for Production (and Preview if needed): DB_HOST, DB_PORT (usually 3306), DB_NAME, DB_USER, DB_PASSWORD, and CLOUDINARY_URL. Do not commit these values. Redeploy after adding or changing them.

Create this table in the configured MySQL database:

    CREATE TABLE stagiaires (
      id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      nom VARCHAR(150) NOT NULL,
      prenom VARCHAR(150) NOT NULL,
      ville VARCHAR(150) NOT NULL,
      photo VARCHAR(2048) NOT NULL,
      date_inscription TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    );

The database connection uses the included CA certificate for TLS verification. Root Composer files install the Cloudinary PHP SDK for the Vercel PHP functions.

## Local development

Install dependencies from the repository root with composer install. Set the environment variables above, then run a PHP web server from the repository root. The registration form is under public/atelier-stagiaires/; API routes are /inscrire-stagiaire.php and /liste-stagiaires.php.

Images are limited to 4 MB to stay within Vercel Functions' request size limit.