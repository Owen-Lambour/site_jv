<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Joueur extends BaseController
{
    // Méthode pour afficher la page d'accueil du joueur (cette méthode n'est pas implémentée dans ce code)
    public function index()
    {
        // Cette méthode n'est pas définie dans ce code, il n'y a pas d'action spécifique à réaliser pour la page d'accueil du joueur
        // Si nécessaire, des fonctionnalités supplémentaires peuvent être ajoutées ici
    }

    // Méthode de connexion pour les joueurs
    public function connexion()
    {
        // Vérification si le formulaire de connexion a été soumis
        if (isset($_POST["connecter"])) {

            // Connexion à la base de données
            $db = \Config\Database::connect();

            // Requête pour récupérer le joueur en fonction de son email
            $joueurQuery = $db->table('joueur')->getWhere(["email_joueur" => $_POST["email"]]);
            $joueurResult = $joueurQuery->getResult("array");

            // Vérification si le joueur existe
            if (isset($joueurResult[0])) {
                // Vérification du mot de passe
                if (password_verify($_POST["pass"], $joueurResult[0]["pass_joueur"])) {
                    // Si le mot de passe est valide, on crée une session pour marquer la connexion du joueur
                    session_start();
                    $_SESSION["CONNEXIONJOUEUR"] = true;
                    $_SESSION["id_joueur"] = $joueurResult[0]["id_joueur"];

                    // Redirection vers la liste des joueurs (à adapter selon l'application)
                    return redirect()->route("liste_joueur");
                } else {
                    // Le mot de passe est invalide, on affiche un message d'erreur
                    $data['error'] = "Le mot de passe est invalide";
                }
            } else {
                // Le joueur n'existe pas, on affiche un message d'erreur
                $data['error'] = "Le mail est invalide";
            }
        }

        // Préparation des données pour la vue
        $data['title'] = "Connexion";
        $data['css'] = "joueur/stylecreation";

        // On retourne la vue 'commun/header' suivi de la vue 'joueur/connexion' et 'commun/footer'
        return view("commun/header", $data) . view("joueur/connexion") . view("commun/footer");
    }


    // Méthode de création de compte pour les joueurs
    public function creation()
    {
        // Vérification si le formulaire de création de compte a été soumis
        if (isset($_POST['creer'])) {

            // Connexion à la base de données
            $db = \Config\Database::connect();

            // Requête pour vérifier si l'email du joueur existe déjà dans la base de données
            $joueurQuery = $db->table('joueur')->getWhere(["email_joueur" => $_POST["email"]]);
            $joueurResult = $joueurQuery->getResult("array");

            // Vérification si l'email existe déjà
            if (isset($joueurResult[0])) {
                // L'email existe déjà, on affiche un message d'erreur
                $data['error'] = "Email déjà existant";
            } else if ($_POST["pass"] === $_POST["confirmPass"]) {
                // Les mots de passe correspondent, on peut créer le compte du joueur

                // Construction du tableau de données pour l'insertion du joueur dans la base de données
                $joueur = [
                    "email_joueur" => $_POST["email"],
                    "pass_joueur" => password_hash($_POST["pass"], PASSWORD_DEFAULT),
                    "pseudo_joueur" => $_POST["pseudo"]
                ];

                // Insertion du joueur dans la base de données
                $db = \Config\Database::connect();
                $db->table('joueur')->insert($joueur);

                // Redirection vers la page de connexion du joueur (à adapter selon l'application)
                return redirect()->route("connexion_joueur");
            } else {
                // Les mots de passe ne correspondent pas, on affiche un message d'erreur
                $data['error'] = "Les mots de passes ne correspondent pas";
            }
        }

        // Préparation des données pour la vue
        $data['title'] = "Inscription";
        $data['css'] = "joueur/stylecreation";

        // On retourne la vue 'commun/header' suivi de la vue 'joueur/creation' et 'commun/footer'
        return view("commun/header", $data) . view("joueur/creation") . view("commun/footer");
    }
    public function deconnexion()
    {
        // Page de déconnexion
        session_start();
        // Détruire toutes les variables de session
        session_unset();
        // Détruire la session
        session_destroy();


        // Redirection vers la page d'accueil (à adapter selon votre application)
        return redirect()->route('liste_joueur');
    }
}
