<?php
// Vérification si la variable $error est définie, ce qui indique la présence d'une erreur de connexion
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

<!-- Formulaire de connexion -->
<main class="container col-md-6 col-lg-4 border border-secondary rounded-4">
    <form action="/admin/connexion" method="POST" class="p-3">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <!-- Champ de saisie pour l'email, requis et affiche un message "Saisissez votre Email" -->
            <input type="email" id="email" name="email" required class="form-control" placeholder="Saisissez votre Email">
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label">Mot de passe</label>
            <!-- Champ de saisie pour le mot de passe, requis et affiche un message "Saisissez votre mot de Passe" -->
            <input id="pass" name="pass" type="password" required class="form-control" placeholder="Saisissez votre mot de Passe">
        </div>

        <div class="d-grid">
            <!-- Bouton de soumission du formulaire pour se connecter -->
            <button id="connecter" name="connecter" type="submit" class="btn btn-secondary">Connexion</button>
        </div>
    </form>