<!-- Container pour contenir le formulaire de recherche de jeux -->
<div class="container mt-5">
    <!-- Première ligne de la grille pour le titre de la page -->
    <div class="row">
        <div class="col-md-12">
            <!-- Titre de la page -->
            <h1 class="text-center my-5">Recherche de jeux</h1>
        </div>
    </div>
    <!-- Formulaire de recherche de jeux avec la méthode POST et l'action pointant vers "liste_joueur" -->
    <form action="<?= url_to('liste_joueur') ?>" method="POST">
        <!-- Deuxième ligne de la grille avec des colonnes alignées au centre -->
        <div class="row justify-content-center">
            <!-- Première colonne de formulaire pour le titre du jeu -->
            <div class="col-md-4 mb-3">
                <label for="titre" class="form-label">Titre du jeu :</label>
                <!-- Champ de saisie pour le titre du jeu -->
                <input type="text" name="titre" id="titre" class="form-control">
            </div>
            <!-- Deuxième colonne de formulaire pour la date de sortie du jeu -->
            <div class="col-md-4 mb-3">
                <label for="date_sortie" class="form-label">Date de sortie :</label>
                <!-- Champ de saisie pour la date de sortie du jeu -->
                <input type="date" name="date_sortie" id="date_sortie" class="form-control">
            </div>
        </div>
        <!-- Troisième ligne de la grille avec des colonnes alignées au centre -->
        <div class="row justify-content-center">
            <!-- Troisième colonne de formulaire pour sélectionner le développeur du jeu -->
            <div class="col-md-4 mb-3">
                <label for="developpeur" class="form-label">Développeur :</label>
                <!-- Liste déroulante pour sélectionner le développeur du jeu -->
                <select name="developpeur" id="developpeur" class="form-control">
                    <!-- Option pour sélectionner tous les développeurs -->
                    <option value="">Tous</option>
                    <!-- Boucle pour afficher chaque développeur dans la liste déroulante -->
                    <?php foreach ($listeDeveloppeur as $developpeur) { ?>
                        <option value="<?= $developpeur["id_developpeur"] ?>"><?= $developpeur["nom_developpeur"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- Quatrième colonne de formulaire pour sélectionner l'éditeur du jeu -->
            <div class="col-md-4 mb-3">
                <label for="editeur" class="form-label">Éditeur :</label>
                <!-- Liste déroulante pour sélectionner l'éditeur du jeu -->
                <select name="editeur" id="editeur" class="form-control">
                    <!-- Option pour sélectionner tous les éditeurs -->
                    <option value="">Tous</option>
                    <!-- Boucle pour afficher chaque éditeur dans la liste déroulante -->
                    <?php foreach ($listeEditeur as $editeur) { ?>
                        <option value="<?= $editeur["id_editeur"] ?>"><?= $editeur["nom_editeur"] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!-- Bouton de soumission du formulaire pour effectuer la recherche -->
        <div class="text-center">
            <button name="chercherjeu" id="chercherjeu" type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </form>
</div>