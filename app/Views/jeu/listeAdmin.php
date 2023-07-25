<main class="container">
    <!-- Utilisation de la classe "table-responsive" pour rendre le tableau adaptatif -->
    <div class="table-responsive">
        <!-- Tableau pour afficher la liste des jeux -->
        <table class="table table-bordered">
            <thead>
                <!-- En-tête du tableau avec les titres des colonnes -->
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date de sortie</th>
                    <th scope="col">Editeur</th>
                    <th scope="col">Developpeur</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle pour afficher chaque jeu de la liste -->
                <?php foreach ($listeJeu as $jeu) { ?>
                    <tr>
                        <!-- Affichage du nom du jeu -->
                        <td><?= $jeu["nom_jeu"] ?></td>
                        <!-- Affichage de la date de sortie du jeu -->
                        <td><?= $jeu["date_jeu"] ?></td>
                        <!-- Affichage du nom de l'éditeur du jeu -->
                        <td><?= $jeu["nom_editeur"] ?></td>
                        <!-- Affichage du nom du développeur du jeu -->
                        <td><?= $jeu["nom_developpeur"] ?></td>
                        <!-- Lien pour éditer le jeu, en utilisant l'URL générée par la fonction "url_to" -->
                        <td><a href="<?= str_replace("/index.php", "", url_to("editer_jeu", $jeu['id_jeu'])) ?>">Editer</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>