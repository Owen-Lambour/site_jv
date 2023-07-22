<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? "Avis JV - " . esc($title) : "Avis JV" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?php
    if (isset($css)) {
    ?>
        <link rel="stylesheet" href="/css/<?= $css ?>.css">
    <?php
    }
    ?>

</head>

<body>
    <header class="fixed-top bg-light py-2 border">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <a href="<?= base_url('jeu/liste') ?>" class="text-decoration-none">
                    <h1 class="text-primary m-0">Avis JV</h1>
                </a>
            </div>
            <div>
                <nav class="d-flex gap-3">
                    <a href="<?= base_url('jeu/liste') ?>" class="btn btn-outline-primary">Liste des jeux</a>
                    <a href="<?= base_url('joueur/connexion') ?>" class="btn btn-outline-primary">Connexion</a>
                    <a href="<?= base_url('joueur/creation') ?>" class="btn btn-outline-primary">Inscription</a>
                </nav>
            </div>
        </div>
    </header>