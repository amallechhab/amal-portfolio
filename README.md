# Portfolio - Amal Ben Haaman Lechhab

Projet : Git + GitHub + Vercel (Formation FullStack, 2ème année).

## Structure

```
portfolio/
├── api/
│   └── index.php        <- la page d'accueil (tout le site est ici)
├── public/
│   ├── images/          <- mets photo.jpg ici
│   └── docs/            <- tes PDF si besoin
└── vercel.json
```

## Ce que tu modifies

Ouvre `api/index.php`. En haut du fichier :
- `$nom` et `$github` : ton nom et ton lien GitHub
- `$competences` : ta liste de compétences
- `$ateliers` : tes ateliers. Quand un atelier est terminé, mets `"statut" => "ok"`, change le titre et la description, et colle le lien Git dans `"git"`. Copie un bloc pour ajouter un atelier.
- Ajoute ta photo dans `public/images/photo.jpg`

## Mettre en ligne

```
git config --global user.name "Votre Nom"
git config --global user.email "votre@email.com"

git clone https://github.com/amallechhab/NOM-DU-REPO.git
# copie les fichiers de ce projet dans le dossier clone

git add .
git commit -m "Mon portfolio"
git push
```

Ensuite sur Vercel : Add New > Project > Import ton repo > Application Preset "Other" > Deploy.
