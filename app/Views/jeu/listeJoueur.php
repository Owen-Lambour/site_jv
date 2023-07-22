<main class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center my-5">Liste des jeux</h1>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <?php foreach ($listeJeu as $jeu) { ?>
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="<?= $jeu["image_jeu"] ?>" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $jeu["nom_jeu"] ?></h5>
                        <h6>Développeur : <?= $jeu["nom_developpeur"] ?></h6>
                        <h6>Editeur : <?= $jeu["nom_editeur"] ?></h6>
                        <h6>Date : <?= $jeu["date_jeu"] ?></h6>
                        <p class="card-text"><?= substr($jeu["sypnosis_jeu"], 0, 50) ?>...</p>
                        <a href="<?= str_replace("/index.php", "", url_to("afficher_jeu", $jeu['id_jeu'])) ?>" class="btn btn-primary">Afficher</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>