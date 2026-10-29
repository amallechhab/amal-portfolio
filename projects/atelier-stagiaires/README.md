# Atelier des stagiaires

A PHP and MySQL registration app. It accepts trainee details and a photo, stores the record in MySQL, and uploads photos to Cloudinary. The app includes a registration form and a page that lists saved trainees.

## Requirements

- PHP with PDO MySQL and the MySQL SSL extension
- Composer
- A MySQL database with a stagiaires table
- A Cloudinary account

Create the table with:

    CREATE TABLE stagiaires (
      id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      nom VARCHAR(150) NOT NULL,
      prenom VARCHAR(150) NOT NULL,
      ville VARCHAR(150) NOT NULL,
      photo VARCHAR(2048) NOT NULL,
      date_inscription TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    );

Install dependencies in this directory with composer install. Set these environment variables in the PHP hosting environment; do not commit their values:

- DB_HOST
- DB_PORT
- DB_NAME
- DB_USER
- DB_PASSWORD
- CLOUDINARY_URL

The database connection uses the included CA certificate for TLS verification. The original project archive contained database credentials; this copy reads credentials only from environment variables.

## Run locally

Install dependencies, configure the environment variables, then serve this directory with a PHP runtime. The included vercel.json is kept from the source project; deployment also requires a compatible PHP runtime and configured database and Cloudinary credentials.