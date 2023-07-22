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
        <form action="/connexion-joueur" method="POST" class="p-3">
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



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    </body>

    </html>