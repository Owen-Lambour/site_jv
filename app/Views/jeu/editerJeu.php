<?php
// Chargement du helper "form" pour faciliter la gestion des formulaires
helper("form")
?>
<div class="container mt-5">
    <!-- Titre de la page de modification du jeu -->
    <h1 class="text-center mb-4">Modification du Jeu</h1>
    <!-- Formulaire pour modifier les informations du jeu -->
    <form action="<?= url_to('editer_jeu', $jeu["id_jeu"]) ?>" method="post" enctype="multipart/form-data">
        <!-- Champ de saisie pour le titre du jeu -->
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du jeu :</label>
            <input type="text" name="titre" class="form-control" value="<?= $jeu['nom_jeu'] ?>" required>
        </div>

        <!-- Champ de saisie pour la date de sortie du jeu -->
        <div class="mb-3">
            <label for="date_sortie" class="form-label">Date de sortie :</label>
            <input type="date" name="date_sortie" class="form-control" value="<?= $jeu['date_jeu'] ?>">
        </div>

        <!-- Champ de saisie pour la description du jeu -->
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea name="description" class="form-control" rows="4" required><?= $jeu['sypnosis_jeu'] ?></textarea>
        </div>

        <!-- Champ de sélection pour l'éditeur du jeu -->
        <div class="mb-3">
            <label for="id_editeur" class="form-label">Éditeur :</label>
            <select name="id_editeur" class="form-control">
                <!-- Boucle pour afficher les options des éditeurs disponibles -->
                <?php foreach ($listeEditeur as $editeur) { ?>
                    <option value="<?= $editeur['id_editeur'] ?>" <?= set_select('id_editeur', $editeur['id_editeur'], ($jeu['id_editeur'] == $editeur['id_editeur'])) ?>>
                        <?= $editeur['nom_editeur'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- Champ de sélection pour le développeur du jeu -->
        <div class="mb-3">
            <label for="id_developpeur" class="form-label">Développeur :</label>
            <select name="id_developpeur" class="form-control">
                <!-- Boucle pour afficher les options des développeurs disponibles -->
                <?php foreach ($listeDeveloppeur as $developpeur) { ?>
                    <option value="<?= $developpeur['id_developpeur'] ?>" <?= set_select('id_developpeur', $developpeur['id_developpeur'], ($jeu['id_developpeur'] == $developpeur['id_developpeur'])) ?>>
                        <?= $developpeur['nom_developpeur'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- Bouton de soumission du formulaire pour enregistrer les modifications -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="modifier" id="modifier">Enregistrer</button>
        </div>
    </form>
</div>