    <?php
    if (isset($error)) {
    ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>

    <main class="container col-3 border border-secondary rounded-4">
        <div class="my-4">
            <h2 class="col-8 mx-auto text-center">Connectez-vous</h2>
        </div>
        <hr>
        <form action="/joueur/connexion" method="POST" class="p-3">
            <div class="row">
                <div class="col-8 mx-auto">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" required class="form-control" placeholder="Saisissez votre Email">
                </div>
            </div>


            <div class="row">
                <div class="col-8 mx-auto my-2">
                    <label for="pass" class="form-label">Mot de passe</label>
                    <input id="pass" name="pass" type="password" required class="form-control" placeholder="Saisissez votre mot de Passe">
                </div>
            </div>


            <div class="d-flex justify-content-center align-items-center my-2">
                <button id="connecter" name="connecter" type="submit" class="btn btn-secondary">Connexion</button>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <a href="<?= str_replace("/index.php", "", url_to("creation_joueur")) ?>">Inscrivez-vous ici</a>
            </div>
        </form>
    </main>