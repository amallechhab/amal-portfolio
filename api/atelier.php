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
    'parts' => ['Planification en groupe : Quick Annonces', 'Proposition : modèle en V, tableau des tâches, PERT, chemin critique et Gantt'],
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
/* Same palette and typographic identity as Amal's original portfolio. */
:root{
  --bg:#f5f7fb;--fg:#13213b;--muted:#56637a;
  --accent:#1d4ed8;--accent-fg:#ffffff;
  --lilac:#dce6fa;--peach:#e0eef0;--card:#ffffff;--line:#d5deec;
  --font-display:'DM Serif Display',Georgia,serif;
  --font-body:'Figtree',system-ui,-apple-system,'Segoe UI',sans-serif;
  color-scheme:light
}
@media(prefers-color-scheme:dark){
 :root{
  --bg:#0e1626;--fg:#e8eefb;--muted:#9db0cc;
  --accent:#6ea8fe;--accent-fg:#0a1426;
  --lilac:#1c2d52;--peach:#173a42;--card:#15203a;--line:#2a3b5e;
  color-scheme:dark
 }
}
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{margin:0;font-family:var(--font-body);background:var(--bg);color:var(--fg);font-size:16px;line-height:1.65}
a{color:inherit}
.wrap{width:min(980px,calc(100% - 40px));margin-inline:auto}
header{border-bottom:2px solid var(--line);background:var(--bg)}
header .wrap{display:flex;align-items:center;justify-content:space-between;gap:18px;min-height:68px;padding-block:10px}
.logo{font-family:var(--font-display);font-size:1.3rem;font-weight:400;color:var(--accent);text-decoration:none}
.back{display:inline-flex;align-items:center;gap:8px;font-size:14px;font-weight:700;color:var(--accent);text-decoration:none}
.back:hover{text-decoration:underline}
.hero{padding:62px 0 38px;background:var(--bg);color:var(--fg)}
.kicker{display:flex;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:16px}
.eyebrow{color:var(--accent);font-size:13px;letter-spacing:.14em;text-transform:uppercase;font-weight:700}
.kicker .pill{border:2px solid var(--line);color:var(--muted);border-radius:999px;padding:3px 10px;font-size:12px;font-weight:700}
h1{font:400 clamp(2rem,5vw,3.25rem)/1.12 var(--font-display);margin:0 0 18px}
.hero p{font-size:16px;color:var(--muted);max-width:66ch;margin:0}
main{padding:14px 0 66px}
.content-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:20px}
.box{background:var(--card);border:2px solid var(--line);border-radius:24px;padding:25px;min-width:0}
.box h2{font-family:var(--font-display);font-weight:400;font-size:1.55rem;margin:0 0 12px}
.box p{color:var(--muted);font-size:14px;margin:0 0 17px}
.small{font-size:12px!important;color:var(--muted)}
.list{margin:0;padding:0;list-style:none;display:grid;gap:10px}
.list li{background:color-mix(in srgb,var(--lilac) 36%,var(--card));border:1px solid var(--line);border-radius:14px;padding:12px 15px;font-size:14px}
.list li::before{content:"•";color:var(--accent);font-weight:700;margin-right:9px}
.links{display:grid;gap:10px}
.action{display:flex;align-items:center;justify-content:space-between;gap:12px;text-decoration:none;background:var(--card);color:var(--accent);border:2px solid var(--accent);border-radius:999px;padding:10px 16px;font-weight:700;font-size:13px}
.action:hover{background:var(--accent);color:var(--accent-fg)}
.action span{font-size:18px}
.notice{background:color-mix(in srgb,var(--peach) 40%,var(--card));border:1px solid var(--line);border-radius:14px;padding:15px;color:var(--muted);font-size:14px}
footer{border-top:2px dashed var(--line);padding:24px 0 35px;font-size:13px;color:var(--muted)}
a:focus-visible{outline:3px solid var(--accent);outline-offset:4px}
@media(max-width:700px){
 .content-grid{grid-template-columns:1fr}
 .hero{padding:45px 0 30px}
 .box{padding:20px}
 header .wrap{flex-wrap:wrap}
}
</style>
</head>
<body>
<header><div class="wrap">
<a class="logo" href="/">Amal</a>
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
<?php if ($num === 1): ?>
<p>Une proposition complète de planification est disponible : modèle en V, dépendances, PERT, chemin critique et Gantt. Les durées proposées restent à valider avec le groupe.</p>
<?php else: ?>
<p>Parties décrites dans le support du formateur. Les solutions personnelles ne sont pas encore publiées ici.</p>
<?php endif; ?>
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
<?php if ($num === 1): ?>
<a class="action" style="margin-top:12px" href="/projects/atelier1-quick-annonces/index.html">Voir la proposition de planification <span aria-hidden="true">↗</span></a>
<?php endif; ?>
<?php endif; ?>
</section>
</div></main>
<?php endif; ?>
<footer><div class="wrap">© <?= date('Y') ?> Amal Lechhab · Portfolio OFPPT</div></footer>
</body>
</html>
