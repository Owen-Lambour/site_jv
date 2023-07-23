<?php
// Vérification si la variable $error est définie, ce qui indique la présence d'une erreur lors de la création du compte
if (isset($error)) {
?>

    <!-- Affichage de l'alerte d'erreur -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $error ?>
        <!-- Bouton pour fermer l'alerte -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<!-- Formulaire de création de compte administrateur -->
<main class="container col-3 border border-secondary rounded-4">
    <form action="/admin/creation" method="POST" class="p-3">

        <!-- Champ de saisie pour le pseudo, requis et affiche un message "Saisissez votre Pseudo" -->
        <div class="row">
            <div class="col-8 mx-auto">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" required class="form-control" placeholder="Saisissez votre Pseudo">
            </div>
        </div>

        <br>

        <!-- Champ de saisie pour l'email, requis et affiche un message "Saisissez votre Email" -->
        <div class="row">
            <div class="col-8 mx-auto">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" required class="form-control" placeholder="Saisissez votre Email">
            </div>
        </div>

        <br>

        <!-- Champ de saisie pour le mot de passe, requis et affiche un message "Saisissez votre mot de Passe" -->
        <div class="row">
            <div class="col-8 mx-auto">
                <label for="pass" class="form-label">Mot de passe</label>
                <input id="pass" name="pass" type="password" required class="form-control" placeholder="Saisissez votre mot de Passe">
            </div>
        </div>

        <br>

        <!-- Champ de saisie pour la confirmation du mot de passe, requis et affiche un message "Saisissez votre mot de Passe" -->
        <div class="row">
            <div class="col-8 mx-auto">
                <label for="confirmPass" class="form-label">Confirmer mot de passe</label>
                <input id="confirmPass" name="confirmPass" type="password" required class="form-control" placeholder="Saisissez votre mot de Passe">
            </div>
        </div>

        <br>

        <!-- Bouton de soumission du formulaire pour créer un compte -->
        <div class="d-flex justify-content-center align-items-center">
            <button id="creer" name="creer" type="submit" class="btn btn-secondary">Créer un compte</button>
        </div>
    </form>
</main>