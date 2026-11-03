<?php
declare(strict_types=1);

/*
 * Pages de détail des ateliers M02 d'Amal.
 * Les supports sont ceux du formateur. Les solutions ne sont pas présentées
 * comme réalisées lorsque rien n'a été publié.
 * Atelier 6 : aucun bouton PDF, conformément à la demande d'Amal.
 */
$root = 'https://portfoliofs202.vercel.app/docs/';
$ateliers = [
  1 => [
    'title' => 'Méthodes classiques : PERT & Gantt',
    'desc' => 'Planification du projet Quick Annonces : tâches, dépendances, diagramme PERT, chemin critique et Gantt.',
    'pdf' => $root.'At1_gestionprojet.pdf',
    'parts' => ['Planification en groupe : Quick Annonces'],
  ],
  2 => [
    'title' => 'Agile Scrum & Sprint',
    'desc' => 'Questions sur Agile et Scrum, puis sprint de conception de Quick Annonce avec Jira, Product Backlog, Planning, Review et Retrospective.',
    'pdf' => $root.'At2_gestionprojet.pdf',
    'parts' => ['Partie 1 — Travail individuel : Agile et Scrum', 'Partie 2 — Travail en groupe : Sprint de conception'],
  ],
  3 => [
    'title' => 'Les bases de Git',
    'desc' => 'Initialiser un dépôt, enregistrer des versions et consulter l\'historique du projet.',
    'pdf' => $root.'At3_git.pdf',
    'parts' => ['Partie 1 — Configuration et création du projet', 'Partie 2 — Premier commit', 'Partie 3 — Modifier un fichier', 'Partie 4 — Gérer plusieurs fichiers', 'Partie 5 — Bilan'],
  ],
  4 => [
    'title' => 'GitHub : travail collaboratif',
    'desc' => 'Travail sur GitHub, gestion des versions et collaboration à partir d\'un dépôt distant.',
    'pdf' => $root.'At4_github.pdf',
    'parts' => [],
  ],
  5 => [
    'title' => 'Entraînement Git type EFM',
    'desc' => 'S\'exercer à utiliser Git dans le cadre d\'un sujet type EFM.',
    'pdf' => $root.'At5_github.pdf',
    'parts' => [],
  ],
  6 => [
    'title' => 'Prérequis Sprint 3 : PHP, MySQL & Cloudinary',
    'desc' => 'Application d\'inscription des stagiaires avec formulaire HTML, backend PHP, base MySQL Aiven et photos Cloudinary.',
    'pdf' => '',
    'parts' => [],
    'links' => [
      ['Formulaire d\'inscription','/atelier-stagiaires/index.html'],
      ['Liste des stagiaires','/atelier-stagiaires/liste.html'],
      ['Présentation du projet','/projects/atelier-stagiaires/overview.html'],
      ['Code source sur GitHub','https://github.com/amallechhab/amal-portfolio/tree/main/projects/atelier-stagiaires'],
    ],
  ],
  7 => [
    'title' => 'GitLab CI/CD & SonarQube Cloud',
    'desc' => 'Découvrir l\'analyse qualité, comparer les versions V1 et V2, et observer le pipeline GitLab CI/CD.',
    'pdf' => $root.'At7_gitlab_sonarqube.pdf',
    'parts' => ['V1 — Code correct, analyse et déploiement', 'V2 — Code modifié et analyse SonarQube'],
  ],
];

$num = filter_input(INPUT_GET,'num',FILTER_VALIDATE_INT);
if (!is_int($num) || !isset($ateliers[$num])) {
    http_response_code(404);
    $num = 0;
}
$atelier = $num ? $ateliers[$num] : null;
function h($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8');
}
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#101a32">
<meta name="description" content="<?= h($atelier ? 'Atelier '.$num.' — '.$atelier['title'].' — Portfolio Amal Lechhab' : 'Atelier introuvable') ?>">
<title><?= h($atelier ? 'Atelier '.$num.' · '.$atelier['title'].' — Amal' : 'Atelier introuvable — Amal') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Figtree:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#152443;--muted:#60718d;--navy:#121d34;--blue:#1d4ed8;--line:#dae3f2;--bg:#f5f7fc}
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{margin:0;font-family:Figtree,system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--ink);line-height:1.65}
a{color:inherit}
.wrap{width:min(1020px,calc(100% - 38px));margin:auto}
header{background:#111b30;color:#e7efff}
header .wrap{display:flex;align-items:center;justify-content:space-between;gap:16px;padding-block:15px}
.logo{font-weight:850;text-decoration:none;font-size:16px}
.logo span{display:inline-grid;place-items:center;background:#73a9fc;color:#08264b;border-radius:11px;width:36px;height:36px;font-size:19px;font-weight:800;margin-right:10px}
.back{display:inline-flex;align-items:center;gap:8px;text-decoration:none;color:#c3d9ff;font-weight:750;font-size:13px}
.back:hover{text-decoration:underline}
.hero{padding:57px 0 65px;background:radial-gradient(ellipse at 92% 10%,rgba(111,73,145,.32),transparent 39%),linear-gradient(130deg,#151d35,#18315a 69%,#241e3e);color:white}
.eyebrow{color:#a8ceff;font-size:12px;letter-spacing:.15em;text-transform:uppercase;font-weight:850}
.kicker{display:flex;align-items:center;gap:10px;margin-bottom:18px}
.kicker .pill{border:1px solid rgba(206,221,252,.3);border-radius:999px;font-size:11px;padding:4px 9px;color:#b9ceec}
h1{font:400 clamp(2.1rem,5vw,3.5rem)/1.1 'DM Serif Display',Georgia,serif;max-width:780px;margin:0 0 17px}
.hero p{max-width:690px;color:#d0ddf6;font-size:16px;margin:0}
main{padding:32px 0 66px}
.content-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:22px}
.box{background:#fff;border:1px solid var(--line);padding:26px;border-radius:20px;box-shadow:0 10px 28px rgba(17,34,64,.045);min-width:0}
.box h2{font-size:20px;margin:0 0 14px;letter-spacing:-.025em}
.box p{font-size:14px;color:var(--muted);margin:0 0 17px}
.small{font-size:12px!important;color:var(--muted)}
.list{padding:0;margin:0;list-style:none;display:grid;gap:10px}
.list li{padding:13px 15px;background:#f4f7fd;border:1px solid #e3eaf7;border-radius:12px;font-size:13.5px;color:#364d70}
.list li::before{content:"•";color:#3367d9;font-weight:900;margin-right:9px}
.links{display:grid;gap:10px}
.action{display:flex;align-items:center;justify-content:space-between;gap:10px;text-decoration:none;padding:12px 15px;border:1px solid #cfddfb;border-radius:12px;background:#edf4ff;color:#17449c;font-weight:800;font-size:13px}
.action:hover{background:#dceaff;border-color:#9ebffe}
.action span{font-size:17px}
.notice{padding:15px 16px;border-radius:12px;background:#f4f6fc;border:1px solid #e0e6f2;color:#536989;font-size:13px}
footer{padding:24px 0 35px;font-size:12px;color:var(--muted);border-top:1px solid var(--line)}
a:focus-visible{outline:3px solid #74acfa;outline-offset:4px}
@media(max-width:700px){.content-grid{grid-template-columns:1fr}.hero{padding:42px 0 48px}.box{padding:21px}header .wrap{flex-wrap:wrap}}
</style>
</head>
<body>
<header><div class="wrap">
<a class="logo" href="/"><span>A.</span>Amal / Portfolio</a>
<a class="back" href="/#ateliers">← Retour aux ateliers</a>
</div></header>
<?php if (!$atelier): ?>
<section class="hero"><div class="wrap"><h1>Atelier introuvable</h1><p>Ce numéro n'existe pas dans la liste des ateliers.</p></div></section>
<main class="wrap"><a class="action" href="/#ateliers">Revenir aux 7 ateliers <span>↗</span></a></main>
<?php else: ?>
<section class="hero"><div class="wrap">
<div class="kicker"><span class="eyebrow">Atelier <?= $num ?></span><span class="pill">Module M02</span></div>
<h1><?= h($atelier['title']) ?></h1>
<p><?= h($atelier['desc']) ?></p>
</div></section>
<main class="wrap"><div class="content-grid">
<section class="box">
<h2><?= $num === 6 ? 'Application de formation' : 'Exercices et travaux pratiques' ?></h2>
<?php if ($num === 6): ?>
<p>La page d'inscription et le répertoire sont reliés au code PHP, à MySQL Aiven et à Cloudinary. Leur fonctionnement complet dépend des services et variables d'environnement du projet.</p>
<?php elseif ($atelier['parts']): ?>
<p>Parties décrites dans le support du formateur. Les solutions personnelles ne sont pas encore publiées ici.</p>
<ul class="list"><?php foreach ($atelier['parts'] as $part): ?><li><?= h($part) ?></li><?php endforeach; ?></ul>
<?php else: ?>
<p class="notice">L'énoncé de cet atelier est disponible. Les captures et les solutions personnelles seront ajoutées au fur et à mesure.</p>
<?php endif; ?>
</section>
<section class="box">
<h2>Liens et ressources</h2>
<?php if ($num === 6): ?>
<p>Ouvre chaque partie de ton application ou son code.</p>
<div class="links">
<?php foreach ($atelier['links'] as [$label,$href]): ?>
<a class="action" href="<?= h($href) ?>"<?= str_starts_with($href,'http') ? ' target="_blank" rel="noopener noreferrer"' : '' ?>><?= h($label) ?><span aria-hidden="true">↗</span></a>
<?php endforeach; ?>
</div>
<?php else: ?>
<p>Support pédagogique publié par le formateur. Ce document est un énoncé, pas une correction personnelle.</p>
<a class="action" target="_blank" rel="noopener noreferrer" href="<?= h($atelier['pdf']) ?>">Consulter l'énoncé (PDF) <span aria-hidden="true">↗</span></a>
<?php endif; ?>
</section>
</div></main>
<?php endif; ?>
<footer><div class="wrap">© <?= date('Y') ?> Amal Lechhab · Portfolio OFPPT</div></footer>
</body>
</html>
