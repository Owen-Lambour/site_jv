<!-- Formulaire de recherche -->
<form method="post" class="row justify-content-center g-3 mb-4 my-4">
    <div class="col-md-3">
        <label for="titre" class="form-label">Titre du jeu :</label>
        <input type="text" name="titre" id="titre" class="form-control">
    </div>
    <div class="col-md-2">
        <label for="date_sortie" class="form-label">Date de sortie :</label>
        <input type="date" name="date_sortie" id="date_sortie" class="form-control">
    </div>
    <div class="col-md-2">
        <label for="developpeur" class="form-label">Développeur :</label>
        <select name="developpeur" id="developpeur" class="form-select">
            <option value="">Sélectionner un développeur</option>
            <?php foreach ($listeDeveloppeur as $developpeur) { ?>
                <option value="<?= $developpeur['id_developpeur'] ?>"><?= $developpeur['nom_developpeur'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-2">
        <label for="editeur" class="form-label">Éditeur :</label>
        <select name="editeur" id="editeur" class="form-select">
            <option value="">Sélectionner un éditeur</option>
            <?php foreach ($listeEditeur as $editeur) { ?>
                <option value="<?= $editeur['id_editeur'] ?>"><?= $editeur['nom_editeur'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-2 d-flex align-items-end">
        <input type="submit" name="chercherjeu" value="Chercher" class="btn btn-primary">
    </div>
</form>