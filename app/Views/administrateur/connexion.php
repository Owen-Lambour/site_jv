<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/administrateur/styleconnexion.css">
</head>

<body>
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



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>