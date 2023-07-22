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
        <form action="/connexion-admin" method="POST" class="p-3">
            <div class="row">
                <div class="col-8 mx-auto">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" required class="form-control" placeholder="Saisissez votre Email">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-8 mx-auto">
                    <label for="pass" class="form-label">Mot de passe</label>
                    <input id="pass" name="pass" type="password" required class="form-control" placeholder="Saisissez votre mot de Passe">
                </div>
            </div>

            <br>

            <div class="d-flex justify-content-center align-items-center">
                <button id="connecter" name="connecter" type="submit" class="btn btn-secondary">Connexion</button>
            </div>
        </form>
    </main>