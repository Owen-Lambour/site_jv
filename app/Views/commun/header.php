<!doctype html>
<html lang="fr">

<head>
    <!-- Définition de l'encodage de caractères -->
    <meta charset="utf-8">
    <!-- Définition de l'échelle d'affichage sur les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Définition du titre de la page avec un ternaire pour afficher "Avis JV - [title]" si $title est défini, sinon "Avis JV" -->
    <title><?= isset($title) ? "Avis JV - " . esc($title) : "Avis JV" ?></title>
    <!-- Chargement du fichier CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <?php
    // Vérification si la variable $css est définie pour charger le fichier CSS correspondant (si nécessaire)
    if (isset($css)) {
    ?>
        <link rel="stylesheet" href="/css/<?= $css ?>.css">
    <?php
    }
    ?>
</head>

<body>
    <!-- En-tête de la page -->
    <header class="bg-light py-2 border">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <!-- Lien vers la page de liste des jeux -->
                <a href="<?= base_url('jeu/liste') ?>" class="text-decoration-none">
                    <h1 class="text-primary m-0">Avis JV</h1>
                </a>
            </div>
            <div>
                <!-- Menu de navigation avec des liens vers la liste des jeux, la page de connexion et la page d'inscription -->
                <nav class="d-flex gap-3">
                    <a href="<?= base_url('jeu/liste') ?>" class="btn btn-outline-primary">Liste des jeux</a>
                    <a href="<?= base_url('joueur/connexion') ?>" class="btn btn-outline-primary">Connexion</a>
                    <a href="<?= base_url('joueur/creation') ?>" class="btn btn-outline-primary">Inscription</a>
                </nav>
            </div>
        </div>
    </header>
</body>

</html>