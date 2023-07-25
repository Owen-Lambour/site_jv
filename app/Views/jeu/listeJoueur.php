<main class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <!-- Titre de la page -->
            <h1 class="text-center my-5">Liste des jeux</h1>
        </div>
    </div>
    <!-- Utilisation de la classe "row-cols" pour afficher le nombre de colonnes en fonction de la taille de l'écran -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <!-- Boucle pour afficher chaque jeu de la liste -->
        <?php foreach ($listeJeu as $jeu) { ?>
            <div class="col mb-4">
                <div class="card h-100">
                    <!-- Image du jeu, affichée en haut de la carte -->
                    <img src="<?= $jeu["image_jeu"] ?>" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <!-- Titre du jeu -->
                        <h5 class="card-title"><?= $jeu["nom_jeu"] ?></h5>
                        <!-- Nom du développeur du jeu -->
                        <h6 class="mb-2">Développeur : <?= $jeu["nom_developpeur"] ?></h6>
                        <!-- Nom de l'éditeur du jeu -->
                        <h6 class="mb-2">Editeur : <?= $jeu["nom_editeur"] ?></h6>
                        <!-- Date de sortie du jeu -->
                        <h6 class="mb-2">Date : <?= $jeu["date_jeu"] ?></h6>
                        <!-- Synopsis du jeu, affiché sous forme de texte réduit à 50 caractères -->
                        <p class="card-text"><?= substr($jeu["sypnosis_jeu"], 0, 50) ?>...</p>
                        <!-- Lien pour afficher les détails du jeu, en utilisant l'URL générée par la fonction "url_to" -->
                        <a href="<?= str_replace("/index.php", "", url_to("afficher_jeu", $jeu['id_jeu'])) ?>" class="btn btn-primary">Afficher</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>