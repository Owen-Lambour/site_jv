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
    <link rel="icon" href="https://image.noelshack.com/fichiers/2023/30/1/1690212111-noir.png" type="image/x-icon">

    <?php

    // Vérification si la variable $css est définie pour charger le fichier CSS correspondant (si nécessaire)
    if (isset($css)) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    ?>
        <!-- Chargement du fichier CSS spécifique à la page -->
        <link rel="stylesheet" href="/css/<?= $css ?>.css">
    <?php
    }
    ?>
</head>

<body>
    <!-- En-tête de la page -->
    <header class="bg-light py-2 border">
        <div class="container">
            <!-- Barre de navigation Bootstrap -->
            <nav class="navbar navbar-expand-md navbar-light">
                <!-- Lien vers la page de liste des jeux -->
                <a href="<?= base_url('jeu/liste') ?>" class="navbar-brand">
                    <img src="https://image.noelshack.com/fichiers/2023/30/1/1690212111-noir.png" alt="Logo" class="me-2 img-fluid" style="max-height: 45px;">
                    Avis JV
                </a>

                <!-- Bouton pour activer/désactiver le menu de navigation sur les petits écrans -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Contenu du menu de navigation -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- Liens vers la liste des jeux, la page de connexion et la page d'inscription -->
                        <li class="nav-item">
                            <a href="<?= base_url('jeu/liste') ?>" class="nav-link">Liste des jeux</a>
                        </li>
                        <?php if (isset($_SESSION['CONNEXIONJOUEUR']) && $_SESSION['CONNEXIONJOUEUR'] === true) { ?>
                            <!-- Affiche le lien de déconnexion si l'utilisateur est connecté -->
                            <li class="nav-item">
                                <a href="<?= base_url('joueur/deconnexion') ?>" class="nav-link">Déconnexion</a>
                            </li>
                        <?php } else { ?>
                            <!-- Affiche le lien de connexion si l'utilisateur n'est pas connecté -->
                            <li class="nav-item">
                                <a href="<?= base_url('joueur/connexion') ?>" class="nav-link">Connexion</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="<?= base_url('joueur/creation') ?>" class="nav-link">Inscription</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>