<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4"><?= esc($jeu['nom_jeu']) ?></h1>
                    <p>Date de sortie : <?= esc($jeu['date_jeu']) ?></p>
                    <p>Développeur : <?= esc($jeu['nom_developpeur']) ?></p>
                    <p>Éditeur : <?= esc($jeu['nom_editeur']) ?></p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h2>Commentaires :</h2>
                    <?php foreach ($commentaires as $commentaire) { ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($commentaire['pseudo_joueur']) ?></h5>
                                <p class="card-text">Note : <?= esc($commentaire['notation_commentaire']) ?></p>
                                <p class="card-text"><?= esc($commentaire['contenu_commentaire']) ?></p>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (!$joueur_commentaire_existe) { ?>
                        <a href="<?= base_url('jeu/commentaire/' . $jeu['id_jeu']) ?>" class="btn btn-primary">Ajouter un commentaire</a>
                    <?php } else { ?>
                        <p>Vous avez déjà posté un commentaire pour ce jeu.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>