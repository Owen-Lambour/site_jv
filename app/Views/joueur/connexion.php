<!-- Vérification si la variable $error est définie, ce qui indique la présence d'une erreur de connexion -->
<?php if (isset($error)) : ?>
    <!-- Affichage de l'alerte d'erreur -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $error ?>
        <!-- Bouton pour fermer l'alerte -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Formulaire de connexion -->
<main class="container col-md-6 col-lg-4 border border-secondary rounded-4">
    <div class="my-4">
        <!-- Titre du formulaire -->
        <h2 class="text-center">Connectez-vous</h2>
    </div>
    <hr>
    <form action="/joueur/connexion" method="POST" class="p-3">
        <!-- Champ de saisie pour l'email, requis et affiche un message "Saisissez votre Email" -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" required class="form-control" placeholder="Saisissez votre Email">
        </div>
        <!-- Champ de saisie pour le mot de passe, requis et affiche un message "Saisissez votre mot de passe" -->
        <div class="mb-3">
            <label for="pass" class="form-label">Mot de passe</label>
            <input id="pass" name="pass" type="password" required class="form-control" placeholder="Saisissez votre mot de passe">
        </div>
        <!-- Bouton de soumission du formulaire pour se connecter -->
        <div class="d-flex justify-content-center align-items-center my-2">
            <button id="connecter" name="connecter" type="submit" class="btn btn-secondary">Connexion</button>
        </div>
        <!-- Lien pour rediriger vers la page d'inscription -->
        <div class="d-flex justify-content-center align-items-center">
            <a href="<?= str_replace("/index.php", "", url_to("creation_joueur")) ?>">Inscrivez-vous ici</a>
        </div>
    </form>