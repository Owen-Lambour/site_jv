<main class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">
                    Nom
                </th>

                <th scope="col">
                    Date de sortie
                </th>

                <th scope="col">
                    Editeur
                </th>

                <th scope="col">
                    Developpeur
                </th>


                <th scope="col">

                </th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($listeJeu as $jeu) {
            ?>
                <tr>
                    <td><?= $jeu["nom_jeu"]  ?></td>
                    <td><?= $jeu["date_jeu"]  ?></td>
                    <td><?= $jeu["nom_editeur"]  ?></td>
                    <td><?= $jeu["nom_developpeur"] ?></td>
                    <td> <a href="/jeu/editer/<?= $jeu['id_jeu'] ?>">Editer</a></td>
                </tr>
            <?php

            } ?>
        </tbody>

    </table>
</main>