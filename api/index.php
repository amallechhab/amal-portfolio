<?php
// ============================================================
//  PORTFOLIO - Amal Ben Haaman Lechhab
//  Pour modifier le site, change seulement cette partie en haut.
// ============================================================

$nom    = "Amal Ben Haaman Lechhab";
$github = "https://github.com/amallechhab";

// Ta photo : mets ton fichier dans public/images/photo.jpg
$photo = "/images/photo.jpg";

// Tes compétences
$competences = ["HTML", "CSS", "Bootstrap", "JavaScript", "POO", "PHP", "MySQL", "Python", "Git", "GitHub"];

// Tes ateliers / TP. Un bloc par atelier.
// Quand un atelier est terminé : change "statut" en "ok", remplace le titre,
// et la description. Chaque atelier a ses exercices (Ex 1, Ex 2, Ex 3, Ex Groupe).
// Pour chaque exercice : mets les photos de la solution dans "photos", ex.
//   "photos" => ["/images/ateliers/atelier1/ex1-1.jpg", "/images/ateliers/atelier1/ex1-2.jpg"]
// (les images se mettent dans public/images/ateliers/atelier1/).
// "doc" (dans l'atelier) = l'énoncé en PDF, ex. "/docs/atelier1.pdf" (fichier dans public/docs/).
// "doc" (dans un exercice) est optionnel : un PDF/PPTX de la solution.
// Pour ajouter un exercice, copie une ligne ["label" => ...] et change le nom.
// Pour ajouter un atelier, copie un bloc et colle-le a la suite.
$ateliers = [
  [
    "num"      => "Atelier 1",
    "statut"   => "ok",
    "title_fr" => "Gestion de projet : Méthodes classiques",
    "title_en" => "Project management: classic methods",
    "desc_fr"  => "Planification du projet « Quick Annonces » : tâches, dépendances, diagramme de PERT, chemin critique et diagramme de Gantt.",
    "desc_en"  => "Planning of the “Quick Annonces” project: tasks, dependencies, PERT diagram, critical path and Gantt chart.",
    "doc"      => "/docs/atelier1.pdf", // énoncé de l'atelier (PDF)
    "exercices" => [
      ["label" => "Ex Groupe", "photos" => [], "doc" => ""],
    ],
  ],
  [
    "num"      => "Atelier 2",
    "statut"   => "ok",
    "title_fr" => "Gestion de projet : Agile Scrum",
    "title_en" => "Project management: Agile Scrum",
    "desc_fr"  => "Questions sur Agile et Scrum, puis sprint de conception du projet « Quick Annonce » avec Jira : Product Backlog, Sprint Planning, Review et Retrospective.",
    "desc_en"  => "Agile and Scrum questions, then a design sprint for the “Quick Annonce” project with Jira: Product Backlog, Sprint Planning, Review and Retrospective.",
    "doc"      => "/docs/atelier2.pdf", // énoncé de l'atelier (PDF)
    "exercices" => [
      ["label" => "Partie 1 (individuel)", "photos" => [], "doc" => ""],
      ["label" => "Partie 2 (groupe)",     "photos" => [], "doc" => ""],
    ],
  ],
  [
    "num"      => "Atelier 3",
    "statut"   => "bientot",
    "title_fr" => "Titre de l'atelier 3",
    "title_en" => "Title of workshop 3",
    "desc_fr"  => "Description courte de ce que j'ai réalisé dans cet atelier.",
    "desc_en"  => "Short description of what I built in this workshop.",
    "doc"      => "", // énoncé de l'atelier (PDF), ex. "/docs/atelier3.pdf"
    "exercices" => [
      ["label" => "Ex 1",      "photos" => [], "doc" => ""],
      ["label" => "Ex 2",      "photos" => [], "doc" => ""],
      ["label" => "Ex 3",      "photos" => [], "doc" => ""],
      ["label" => "Ex Groupe", "photos" => [], "doc" => ""],
    ],
  ],
];

// Tes projets (PDF ou PPTX). Mets le fichier dans public/docs/ puis remplis "file".
// Tant que "file" est vide, la carte affiche "Bientôt".
$projets = [
  [
    "type"     => "PDF", // "PDF" ou "PPTX"
    "title_fr" => "Projet 1",
    "title_en" => "Project 1",
    "desc_fr"  => "Description de mon projet 1.",
    "desc_en"  => "Description of my project 1.",
    "file"     => "", // ex. "/docs/projet1.pdf"
  ],
  [
    "type"     => "PPTX",
    "title_fr" => "Projet 2",
    "title_en" => "Project 2",
    "desc_fr"  => "Description de mon projet 2.",
    "desc_en"  => "Description of my project 2.",
    "file"     => "", // ex. "/docs/projet2.pptx"
  ],
];

// ------------------------------------------------------------
function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
// Texte bilingue : affiche le français, l'anglais est stocké pour le bouton EN/FR
function t($fr, $en) { return 'data-fr="' . e($fr) . '" data-en="' . e($en) . '"'; }

$githubIcon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>';
$docIcon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6H6Zm7 1.5L18.5 9H14a1 1 0 0 1-1-1V3.5ZM8 13h8v1.6H8V13Zm0 3.4h8V18H8v-1.6Z"/></svg>';

$facts = [
  ["Âge",       "Age",            "20 ans",                    "20 years old"],
  ["Ville",     "City",           "Tanger, Maroc",             "Tangier, Morocco"],
  ["École",     "School",         "OFPPT · ISMONTIC",          "OFPPT · ISMONTIC"],
  ["Filière",   "Program",        "Développement Digital",     "Digital Development"],
  ["Statut",    "Status",         "Stagiaire",                 "Trainee"],
  ["Spécialité","Focus",          "Développement Web",         "Web Development"],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Portfolio <?= e($nom) ?></title>
<meta name="description" content="Portfolio d'Amal Ben Haaman Lechhab, stagiaire OFPPT en Développement Digital à Tanger.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Figtree:wght@400;500;700&display=swap">
<style>
:root{
  --bg:#f5f7fb; --fg:#13213b; --muted:#56637a;
  --accent:#1d4ed8; --accent-fg:#ffffff;
  --lilac:#dce6fa; --peach:#e0eef0; --card:#ffffff; --line:#d5deec;
  --font-display:'DM Serif Display','Georgia',serif;
  --font-body:'Figtree',system-ui,-apple-system,'Segoe UI',sans-serif;
  color-scheme:light;
}
@media (prefers-color-scheme: dark){
  :root{
    --bg:#0e1626; --fg:#e8eefb; --muted:#9db0cc;
    --accent:#6ea8fe; --accent-fg:#0a1426;
    --lilac:#1c2d52; --peach:#173a42; --card:#15203a; --line:#2a3b5e;
    color-scheme:dark;
  }
}
*{box-sizing:border-box}
html{scroll-behavior:smooth;scroll-padding-top:72px}
body{margin:0;background:var(--bg);color:var(--fg);font-family:var(--font-body);font-size:16px;line-height:1.6}
a{color:inherit}
.wrap{max-width:980px;margin-inline:auto;padding-inline:20px}
section{padding-block:56px}

/* Navigation */
.nav{position:sticky;top:0;z-index:10;background:color-mix(in srgb,var(--bg) 88%,transparent);backdrop-filter:blur(8px);border-bottom:2px solid var(--line)}
.nav .wrap{display:flex;align-items:center;justify-content:space-between;gap:12px;padding-block:10px}
.brand{font-family:var(--font-display);font-size:1.25rem;text-decoration:none;color:var(--accent)}
.links{display:flex;gap:4px;flex-wrap:wrap;align-items:center}
.links a{text-decoration:none;font-weight:700;font-size:14px;padding:6px 12px;border-radius:999px}
.links a:hover{background:var(--lilac)}
.lang{font:inherit;font-weight:700;font-size:14px;letter-spacing:.06em;border:2px solid var(--accent);background:transparent;color:var(--accent);padding:5px 14px;border-radius:999px;cursor:pointer;margin-left:6px}
.lang:hover{background:var(--accent);color:var(--accent-fg)}
a:focus-visible,.lang:focus-visible{outline:3px solid var(--fg);outline-offset:3px}

/* Hero */
.hero{display:grid;grid-template-columns:auto 1fr;gap:40px;align-items:center;padding-block:56px 40px;position:relative}
.photo-wrap{position:relative;width:240px;height:240px}
.photo-wrap::before{content:"";position:absolute;inset:-18px -26px 18px 26px;background:var(--lilac);border-radius:46% 54% 60% 40% / 50% 45% 55% 50%;z-index:0}
.photo-wrap::after{content:"";position:absolute;width:64px;height:64px;right:-14px;bottom:-6px;background:var(--peach);border-radius:50%;z-index:0}
.photo{position:relative;z-index:1;width:100%;height:100%;border-radius:50%;background:var(--card);box-shadow:0 0 0 6px var(--card),0 0 0 9px var(--accent);overflow:hidden;display:grid;place-items:center;color:var(--accent)}
.photo img{width:100%;height:100%;object-fit:cover;display:block}
.photo svg{width:84px;height:84px}
.eyebrow{font-size:13px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--accent);margin:0 0 8px}
h1{font-family:var(--font-display);font-weight:400;font-size:clamp(2.2rem,6vw,3.8rem);line-height:1.06;margin:0 0 14px;text-wrap:balance}
.role{display:inline-block;background:var(--lilac);font-weight:700;padding:6px 16px;border-radius:999px;margin:0 0 16px}
.intro{margin:0 0 22px;max-width:56ch;color:var(--muted)}
.actions{display:flex;flex-wrap:wrap;gap:12px}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;font:inherit;font-weight:700;text-decoration:none;color:var(--accent);border:2px solid var(--accent);padding:10px 18px;border-radius:999px}
.btn:hover{background:var(--accent);color:var(--accent-fg)}
.btn.solid{background:var(--accent);color:var(--accent-fg)}
.btn.solid:hover{filter:brightness(1.08)}
.btn svg{width:18px;height:18px;fill:currentColor}
.btn[aria-disabled="true"]{opacity:.55;border-style:dashed;pointer-events:none}

/* Titres de section */
h2{font-family:var(--font-display);font-weight:400;font-size:clamp(1.7rem,4vw,2.3rem);margin:0 0 8px}
.sub{margin:0 0 28px;color:var(--muted);max-width:60ch}
.tag{display:inline-block;font-size:13px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--accent);margin-bottom:6px}

/* À propos */
.about{display:grid;grid-template-columns:1.1fr 1fr;gap:28px;align-items:start}
.story{background:var(--card);border:2px solid var(--line);border-radius:28px;padding:28px;min-width:0}
.story p{margin:0 0 14px}
.story p:last-child{margin:0}
.facts{display:grid;grid-template-columns:1fr 1fr;gap:12px;min-width:0}
.fact{background:var(--card);border:2px solid var(--line);border-radius:20px;padding:14px 16px;min-width:0}
.fact:nth-child(4n+2),.fact:nth-child(4n+3){background:color-mix(in srgb,var(--lilac) 45%,var(--card))}
.fact span{display:block;font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted)}
.fact strong{display:block;font-size:1.02rem;overflow-wrap:anywhere}

/* Compétences */
.chips{display:flex;flex-wrap:wrap;gap:12px}
.chip{font-weight:700;padding:10px 20px;border-radius:999px;background:var(--card);border:2px solid var(--line)}
.chip:nth-child(3n+1){background:var(--lilac)}
.chip:nth-child(3n+2){background:var(--peach)}

/* Ateliers */
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:20px}
.tp{background:var(--card);border:2px solid var(--line);border-radius:24px;padding:22px;display:flex;flex-direction:column;gap:12px;min-width:0}
.tp:nth-child(3n+2){background:color-mix(in srgb,var(--lilac) 45%,var(--card))}
.tp:nth-child(3n){background:color-mix(in srgb,var(--peach) 55%,var(--card))}
.row{display:flex;align-items:center;justify-content:space-between;gap:8px;flex-wrap:wrap}
.badge{font-weight:700;font-size:13px;letter-spacing:.08em;text-transform:uppercase;background:var(--accent);color:var(--accent-fg);padding:4px 12px;border-radius:999px}
.state{font-size:12px;font-weight:700;color:var(--muted);border:2px dashed var(--line);padding:2px 10px;border-radius:999px}
.tp h3{margin:0;font-size:1.15rem;line-height:1.3}
.tp p{margin:0;color:var(--muted);font-size:15px;flex:1}

/* Atelier cliquable + fenêtre des exercices */
.tp.has-gallery{cursor:pointer}
.tp.has-gallery:focus-visible{outline:3px solid var(--fg);outline-offset:3px}
/* Projets */
.pj{background:var(--card);border:2px solid var(--line);border-radius:24px;padding:22px;display:flex;flex-direction:column;gap:12px;min-width:0}
.pj:nth-child(3n+2){background:color-mix(in srgb,var(--lilac) 45%,var(--card))}
.pj:nth-child(3n){background:color-mix(in srgb,var(--peach) 55%,var(--card))}
.pj h3{margin:0;font-size:1.15rem;line-height:1.3}
.pj p{margin:0;color:var(--muted);font-size:15px;flex:1}
.pj .btns{display:flex;flex-wrap:wrap;gap:10px}

dialog.gal{border:0;padding:0;background:transparent;max-width:min(94vw,960px);width:100%;color:var(--fg)}
dialog.gal::backdrop{background:rgba(8,15,30,.8)}
.gal-box{background:var(--card);border:2px solid var(--line);border-radius:28px;padding:20px;display:flex;flex-direction:column;gap:14px;max-height:92vh;overflow:auto}
.gal-head{display:flex;align-items:center;justify-content:space-between;gap:12px}
.gal-head h3{margin:0;font-family:var(--font-display);font-weight:400;font-size:1.3rem}
.gal-x{font:inherit;font-weight:700;border:2px solid var(--accent);background:transparent;color:var(--accent);width:40px;height:40px;border-radius:50%;cursor:pointer;font-size:18px;line-height:1}
.gal-x:hover{background:var(--accent);color:var(--accent-fg)}
.ex-tabs{display:flex;flex-wrap:wrap;gap:10px}
.ex-tabs button{font:inherit;font-weight:700;font-size:14px;padding:8px 18px;border-radius:999px;border:2px solid var(--accent);background:transparent;color:var(--accent);cursor:pointer}
.ex-tabs button:hover{background:var(--lilac)}
.ex-tabs button[aria-pressed="true"]{background:var(--accent);color:var(--accent-fg)}
.gal-stage{position:relative;display:grid;place-items:center;background:color-mix(in srgb,var(--lilac) 35%,var(--card));border-radius:20px;min-height:200px}
.gal-stage img{max-width:100%;max-height:60vh;object-fit:contain;border-radius:16px;display:block}
.gal-nav{position:absolute;top:50%;transform:translateY(-50%);width:44px;height:44px;border-radius:50%;border:2px solid var(--accent);background:var(--card);color:var(--accent);font-size:20px;cursor:pointer;font-weight:700}
.gal-nav:hover{background:var(--accent);color:var(--accent-fg)}
.gal-prev{left:10px}.gal-next{right:10px}
.gal-count{text-align:center;font-weight:700;font-size:14px;color:var(--muted)}
.gal-empty{padding:40px 20px;text-align:center;color:var(--muted);font-weight:500;background:color-mix(in srgb,var(--lilac) 35%,var(--card));border-radius:20px}
.gal-thumbs{display:flex;gap:8px;overflow-x:auto;padding-bottom:4px}
.gal-thumbs button{flex:0 0 auto;padding:0;border:2px solid var(--line);border-radius:12px;overflow:hidden;cursor:pointer;background:none;width:72px;height:54px}
.gal-thumbs button[aria-current="true"]{border-color:var(--accent)}
.gal-thumbs img{width:100%;height:100%;object-fit:cover;display:block}
.ex-links{display:flex;flex-wrap:wrap;gap:10px}
.gal [hidden]{display:none!important}

/* Contact */
.contact{background:var(--accent);color:var(--accent-fg);border-radius:32px;padding:36px 28px;text-align:center}
.contact h2{margin-bottom:8px}
.contact p{margin:0 auto 20px;max-width:46ch}
.contact .btn{background:var(--accent-fg);color:var(--accent);border-color:var(--accent-fg)}
.contact .btn:hover{filter:brightness(.95);background:var(--accent-fg);color:var(--accent)}

footer{padding-block:28px 56px;color:var(--muted);font-size:14px}
footer .wrap{display:flex;flex-wrap:wrap;gap:8px 24px;justify-content:space-between;border-top:2px dashed var(--line);padding-top:20px}

@media (max-width:760px){
  .hero{grid-template-columns:1fr;justify-items:center;text-align:center;gap:48px}
  .intro{margin-inline:auto}
  .actions{justify-content:center}
  .about{grid-template-columns:1fr}
  .links a{padding:6px 8px}
  .brand{display:none}
  .nav .wrap{justify-content:center}
}
@media (max-width:420px){ .facts{grid-template-columns:1fr} }
@media (prefers-reduced-motion:no-preference){
  .tp,.btn,.lang,.links a,.chip{transition:transform .2s ease,background .2s ease,color .2s ease}
  .tp:hover,.chip:hover{transform:translateY(-4px)}
}
</style>
</head>
<body>

<nav class="nav" aria-label="Navigation principale">
  <div class="wrap">
    <a class="brand" href="#accueil">Amal</a>
    <div class="links">
      <a href="#apropos" <?= t("À propos", "About") ?>>À propos</a>
      <a href="#competences" <?= t("Compétences", "Skills") ?>>Compétences</a>
      <a href="#ateliers" <?= t("Ateliers", "Workshops") ?>>Ateliers</a>
      <a href="#projets" <?= t("Projets", "Projects") ?>>Projets</a>
      <a href="#contact">Contact</a>
      <button class="lang" id="langBtn" type="button" aria-label="Changer de langue / Change language">EN</button>
    </div>
  </div>
</nav>

<main>
  <div class="wrap">
    <header class="hero" id="accueil">
      <div class="photo-wrap">
        <div class="photo" id="photoBox">
          <img src="<?= e($photo) ?>" alt="<?= e($nom) ?>" id="photoImg">
        </div>
      </div>
      <div>
        <p class="eyebrow" <?= t("Stagiaire OFPPT · ISMONTIC Tanger", "OFPPT trainee · ISMONTIC Tangier") ?>>Stagiaire OFPPT · ISMONTIC Tanger</p>
        <h1><?= e($nom) ?></h1>
        <p class="role" <?= t("Développement Web", "Web Development") ?>>Développement Web</p>
        <p class="intro" <?= t(
          "Étudiante de 20 ans à Tanger. J'apprends à créer des sites web, de la page que l'on voit jusqu'à la base de données.",
          "20-year-old student in Tangier. I am learning to build websites, from the page you see to the database behind it."
        ) ?>>Étudiante de 20 ans à Tanger. J'apprends à créer des sites web, de la page que l'on voit jusqu'à la base de données.</p>
        <div class="actions">
          <a class="btn solid" href="#ateliers" <?= t("Voir mes ateliers", "See my workshops") ?>>Voir mes ateliers</a>
          <a class="btn" href="<?= e($github) ?>" target="_blank" rel="noopener"><?= $githubIcon ?>GitHub</a>
        </div>
      </div>
    </header>
  </div>

  <section id="apropos">
    <div class="wrap">
      <span class="tag" <?= t("À propos", "About") ?>>À propos</span>
      <h2 <?= t("Qui je suis", "Who I am") ?>>Qui je suis</h2>
      <p class="sub" <?= t("Un petit résumé de mon parcours.", "A short summary of my journey.") ?>>Un petit résumé de mon parcours.</p>
      <div class="about">
        <article class="story">
          <p <?= t(
            "Je m'appelle Amal, j'ai 20 ans et j'habite à Tanger, au Maroc. Je suis stagiaire à l'OFPPT, à l'ISMONTIC, en filière Développement Digital.",
            "My name is Amal, I am 20 and I live in Tangier, Morocco. I am a trainee at OFPPT, at ISMONTIC, in the Digital Development program."
          ) ?>>Je m'appelle Amal, j'ai 20 ans et j'habite à Tanger, au Maroc. Je suis stagiaire à l'OFPPT, à l'ISMONTIC, en filière Développement Digital.</p>
          <p <?= t(
            "En formation, j'apprends le front-end, le back-end et les bases de données. Ce portfolio rassemble mes ateliers au fur et à mesure, avec le code sur GitHub.",
            "In training, I learn front-end, back-end and databases. This portfolio gathers my workshops as I complete them, with the code on GitHub."
          ) ?>>En formation, j'apprends le front-end, le back-end et les bases de données. Ce portfolio rassemble mes ateliers au fur et à mesure, avec le code sur GitHub.</p>
        </article>
        <div class="facts">
<?php foreach ($facts as $f): ?>
          <div class="fact">
            <span <?= t($f[0], $f[1]) ?>><?= e($f[0]) ?></span>
            <strong <?= t($f[2], $f[3]) ?>><?= e($f[2]) ?></strong>
          </div>
<?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="competences">
    <div class="wrap">
      <span class="tag" <?= t("Compétences", "Skills") ?>>Compétences</span>
      <h2 <?= t("Ce que j'apprends", "What I am learning") ?>>Ce que j'apprends</h2>
      <p class="sub" <?= t("Les langages et outils que j'utilise dans ma formation.", "The languages and tools I use in my training.") ?>>Les langages et outils que j'utilise dans ma formation.</p>
      <div class="chips">
<?php foreach ($competences as $c): ?>
        <span class="chip"><?= e($c) ?></span>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="ateliers">
    <div class="wrap">
      <span class="tag" <?= t("Ateliers", "Workshops") ?>>Ateliers</span>
      <h2 <?= t("Mes ateliers", "My workshops") ?>>Mes ateliers</h2>
      <p class="sub" <?= t("Clique sur un atelier pour voir ses exercices et leurs solutions.", "Click a workshop to see its exercises and their solutions.") ?>>Clique sur un atelier pour voir ses exercices et leurs solutions.</p>
      <div class="grid">
<?php foreach ($ateliers as $a): ?>
        <article class="tp has-gallery" tabindex="0" role="button" aria-haspopup="dialog"
                 data-title-fr="<?= e($a["num"] . " · " . $a["title_fr"]) ?>" data-title-en="<?= e($a["num"] . " · " . $a["title_en"]) ?>"
                 data-doc="<?= e($a["doc"] ?? "") ?>"
                 data-ex="<?= e(json_encode($a["exercices"] ?? [])) ?>">
          <div class="row">
            <span class="badge"><?= e($a["num"]) ?></span>
<?php if ($a["statut"] !== "ok"): ?>
            <span class="state" <?= t("Bientôt", "Soon") ?>>Bientôt</span>
<?php endif; ?>
          </div>
          <h3 <?= t($a["title_fr"], $a["title_en"]) ?>><?= e($a["title_fr"]) ?></h3>
          <p <?= t($a["desc_fr"], $a["desc_en"]) ?>><?= e($a["desc_fr"]) ?></p>
<span class="btn solid" <?= t("Voir les exercices", "See the exercises") ?>>Voir les exercices</span>
        </article>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="projets">
    <div class="wrap">
      <span class="tag" <?= t("Projets", "Projects") ?>>Projets</span>
      <h2 <?= t("Mes projets", "My projects") ?>>Mes projets</h2>
      <p class="sub" <?= t("Mes projets de formation, à ouvrir en PDF ou PowerPoint.", "My training projects, to open as PDF or PowerPoint.") ?>>Mes projets de formation, à ouvrir en PDF ou PowerPoint.</p>
      <div class="grid">
<?php foreach ($projets as $p): ?>
        <article class="pj">
          <div class="row">
            <span class="badge"><?= e($p["type"]) ?></span>
<?php if (empty($p["file"])): ?>
            <span class="state" <?= t("Bientôt", "Soon") ?>>Bientôt</span>
<?php endif; ?>
          </div>
          <h3 <?= t($p["title_fr"], $p["title_en"]) ?>><?= e($p["title_fr"]) ?></h3>
          <p <?= t($p["desc_fr"], $p["desc_en"]) ?>><?= e($p["desc_fr"]) ?></p>
<?php if (!empty($p["file"])): ?>
          <div class="btns">
            <a class="btn solid" href="<?= e($p["file"]) ?>" target="_blank" rel="noopener" <?= t("Voir", "View") ?>>Voir</a>
            <a class="btn" href="<?= e($p["file"]) ?>" download <?= t("Télécharger", "Download") ?>>Télécharger</a>
          </div>
<?php else: ?>
          <span class="btn" aria-disabled="true" <?= t("Fichier bientôt", "File soon") ?>>Fichier bientôt</span>
<?php endif; ?>
        </article>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="wrap">
      <div class="contact">
        <h2 <?= t("Mon code est sur GitHub", "My code is on GitHub") ?>>Mon code est sur GitHub</h2>
        <p <?= t("Retrouve tous mes projets et ateliers sur mon profil.", "Find all my projects and workshops on my profile.") ?>>Retrouve tous mes projets et ateliers sur mon profil.</p>
        <a class="btn" href="<?= e($github) ?>" target="_blank" rel="noopener"><?= $githubIcon ?>github.com/amallechhab</a>
      </div>
    </div>
  </section>
</main>

<footer>
  <div class="wrap">
    <span>© <?= date('Y') ?> <?= e($nom) ?></span>
    <span <?= t("Portfolio de développement web · OFPPT ISMONTIC Tanger", "Web development portfolio · OFPPT ISMONTIC Tangier") ?>>Portfolio de développement web · OFPPT ISMONTIC Tanger</span>
  </div>
</footer>

<dialog class="gal" id="gal" aria-labelledby="galTitle">
  <div class="gal-box">
    <div class="gal-head">
      <h3 id="galTitle"></h3>
      <button class="gal-x" id="galClose" type="button" aria-label="Fermer / Close">✕</button>
    </div>
    <div class="ex-tabs" id="exTabs" role="group" aria-label="Exercices"></div>
    <div class="gal-empty" id="galEmpty" hidden data-fr="Les photos de la solution arrivent bientôt." data-en="The solution photos are coming soon.">Les photos de la solution arrivent bientôt.</div>
    <div id="galMain">
      <div class="gal-stage">
        <button class="gal-nav gal-prev" id="galPrev" type="button" aria-label="Précédent / Previous">‹</button>
        <img id="galImg" src="" alt="">
        <button class="gal-nav gal-next" id="galNext" type="button" aria-label="Suivant / Next">›</button>
      </div>
      <div class="gal-count" id="galCount"></div>
      <div class="gal-thumbs" id="galThumbs"></div>
    </div>
    <div class="ex-links">
      <a class="btn solid" id="exStatement" href="#" target="_blank" rel="noopener" hidden data-fr="Voir l'énoncé (PDF)" data-en="View the instructions (PDF)">Voir l'énoncé (PDF)</a>
      <a class="btn" id="exDoc" href="#" target="_blank" rel="noopener" hidden data-fr="Ouvrir la solution (document)" data-en="Open the solution (document)">Ouvrir la solution (document)</a>
    </div>
  </div>
</dialog>

<script>
(function(){
  var lang='fr';
  var btn=document.getElementById('langBtn');
  function apply(){
    document.documentElement.lang=lang;
    document.querySelectorAll('[data-fr]').forEach(function(el){el.textContent=el.getAttribute('data-'+lang);});
    btn.textContent=lang==='fr'?'EN':'FR';
  }
  btn.addEventListener('click',function(){
    lang=lang==='fr'?'en':'fr';
    apply();
    try{localStorage.setItem('lang',lang);}catch(e){}
  });
  try{var l=localStorage.getItem('lang'); if(l==='en'||l==='fr'){lang=l;}}catch(e){}
  apply();

  // Fenêtre des exercices : clic sur un atelier -> Ex 1, Ex 2, Ex 3, Ex Groupe
  var dlgEl=document.getElementById('gal');
  var gImg=document.getElementById('galImg'), gCount=document.getElementById('galCount');
  var gThumbs=document.getElementById('galThumbs'), gMain=document.getElementById('galMain');
  var gEmpty=document.getElementById('galEmpty'), gTitle=document.getElementById('galTitle');
  var exTabs=document.getElementById('exTabs'), exDoc=document.getElementById('exDoc'), exStatement=document.getElementById('exStatement');
  var exercises=[], photos=[], idx=0, trigger=null;
  function show(i){
    idx=(i+photos.length)%photos.length;
    gImg.src=photos[idx];
    gImg.alt=gTitle.textContent+' ('+(idx+1)+'/'+photos.length+')';
    gCount.textContent=(idx+1)+' / '+photos.length;
    Array.prototype.forEach.call(gThumbs.children,function(b,k){
      if(k===idx){b.setAttribute('aria-current','true');}else{b.removeAttribute('aria-current');}
    });
    var multi=photos.length>1;
    document.getElementById('galPrev').hidden=!multi;
    document.getElementById('galNext').hidden=!multi;
    gThumbs.hidden=!multi;
  }
  function selectEx(i){
    var ex=exercises[i]||{};
    Array.prototype.forEach.call(exTabs.children,function(b,k){b.setAttribute('aria-pressed',k===i?'true':'false');});
    photos=ex.photos||[];
    gThumbs.innerHTML='';
    if(ex.doc){exDoc.href=ex.doc;exDoc.hidden=false;}else{exDoc.hidden=true;}
    if(!photos.length){gMain.hidden=true;gEmpty.hidden=false;return;}
    gMain.hidden=false;gEmpty.hidden=true;
    photos.forEach(function(src,k){
      var b=document.createElement('button');b.type='button';
      b.setAttribute('aria-label','Photo '+(k+1));
      var im=document.createElement('img');im.src=src;im.alt='';im.loading='lazy';
      b.appendChild(im);b.addEventListener('click',function(){show(k);});
      gThumbs.appendChild(b);
    });
    show(0);
  }
  function openAtelier(card){
    trigger=card;
    gTitle.textContent=card.getAttribute('data-title-'+lang);
    try{exercises=JSON.parse(card.getAttribute('data-ex'))||[];}catch(e){exercises=[];}
    var st=card.getAttribute('data-doc')||'';
    if(st){exStatement.href=st;exStatement.hidden=false;}else{exStatement.hidden=true;}
    exTabs.innerHTML='';
    exercises.forEach(function(ex,k){
      var b=document.createElement('button');b.type='button';b.textContent=ex.label||('Ex '+(k+1));
      b.addEventListener('click',function(){selectEx(k);});
      exTabs.appendChild(b);
    });
    selectEx(0);
    if(dlgEl.showModal){dlgEl.showModal();}else{dlgEl.setAttribute('open','');}
  }
  document.querySelectorAll('.tp.has-gallery').forEach(function(card){
    card.addEventListener('click',function(ev){ if(ev.target.closest('a')) return; openAtelier(card); });
    card.addEventListener('keydown',function(ev){
      if(ev.target!==card) return;
      if(ev.key==='Enter'||ev.key===' '){ev.preventDefault();openAtelier(card);}
    });
  });
  document.getElementById('galClose').addEventListener('click',function(){dlgEl.close();});
  dlgEl.addEventListener('click',function(ev){ if(ev.target===dlgEl) dlgEl.close(); });
  dlgEl.addEventListener('close',function(){ if(trigger) trigger.focus(); });
  document.getElementById('galPrev').addEventListener('click',function(){show(idx-1);});
  document.getElementById('galNext').addEventListener('click',function(){show(idx+1);});
  dlgEl.addEventListener('keydown',function(ev){
    if(!photos.length) return;
    if(ev.key==='ArrowLeft') show(idx-1);
    if(ev.key==='ArrowRight') show(idx+1);
  });

  // Si photo.jpg n'existe pas encore, afficher une icone a la place
  var img=document.getElementById('photoImg');
  function noPhoto(){
    document.getElementById('photoBox').innerHTML='<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0 2c-4.4 0-8 2.2-8 5v1h16v-1c0-2.8-3.6-5-8-5Z"/></svg>';
  }
  img.addEventListener('error',noPhoto);
  if(img.complete && img.naturalWidth===0){noPhoto();}
})();
</script>
</body>
</html>