    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center my-5">Recherche de jeux</h1>
            </div>
        </div>
        <form action="<?= url_to('liste_joueur') ?>" method="POST">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <label for="titre" class="form-label">Titre du jeu :</label>
                    <input type="text" name="titre" id="titre" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="date_sortie" class="form-label">Date de sortie :</label>
                    <input type="date" name="date_sortie" id="date_sortie" class="form-control">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <label for="developpeur" class="form-label">Développeur :</label>
                    <select name="developpeur" id="developpeur" class="form-control">
                        <option value="">Tous</option>

                        <?php
                        foreach ($listeDeveloppeur as $developpeur) {
                        ?>
                            <option value="<?= $developpeur["id_developpeur"] ?>"><?= $developpeur["nom_developpeur"] ?></option>

                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="editeur" class="form-label">Éditeur :</label>
                    <select name="editeur" id="editeur" class="form-control">
                        <option value="">Tous</option>

                        <?php
                        foreach ($listeEditeur as $editeur) {
                        ?>
                            <option value="<?= $editeur["id_editeur"] ?>"><?= $editeur["nom_editeur"] ?></option>

                        <?php
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="text-center">
                <button name="chercherjeu" id="chercherjeu" type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </form>
    </div>