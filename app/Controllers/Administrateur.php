<?php

namespace App\Controllers;

use App\Models\Administrateur as ModelsAdministrateur;

class Administrateur extends BaseController
{

    public function index()
    {
        // Cette méthode est vide et ne fait rien.
    }

    public function liste()
    {
        // On récupère le modèle Administrateur
        $model = model(ModelsAdministrateur::class);

        // On récupère la liste des administrateurs à partir du modèle
        $data['listeAdmin'] = $model->findAdmins();

        // On retourne la vue 'administrateur/liste' en passant les données $data
        return view('administrateur/liste', $data);
    }

    public function connexion()
    {
        if (isset($_POST["connecter"])) {
            /*récupérer l'admin en fonction de son email V
            vérifier le mot de passe V
            faire les cookies V
            rediriger vers l'accueil*/

            // On établit une connexion à la base de données
            $db = \Config\Database::connect();

            // On récupère l'administrateur en fonction de l'email saisi dans le formulaire
            $administrateurQuery = $db->table('administrateur')->getWhere(["email_administrateur" => $_POST["email"]]);
            $administrateurResult = $administrateurQuery->getResult("array");

            // Si l'administrateur est trouvé dans la base de données
            if (isset($administrateurResult[0])) {
                // On vérifie si le mot de passe saisi correspond au mot de passe haché dans la base de données
                if (password_verify($_POST["pass"], $administrateurResult[0]["pass_administrateur"])) {
                    // Si les identifiants sont valides, on crée un cookie de connexion
                    setcookie("isConnected", true, time() + 36000);

                    // On redirige l'administrateur vers la page de liste des administrateurs
                    return redirect()->route("liste_admin");
                } else {
                    // Si le mot de passe est invalide, on affiche un message d'erreur
                    $data['error'] = "Le mot de passe est invalide";
                }
            } else {
                // Si l'email n'est pas trouvé dans la base de données, on affiche un message d'erreur
                $data['error'] = "Le mail est invalide";
            }
        }

        // On prépare les données pour la vue de connexion
        $data['title'] = "Connexion admin";
        $data['css'] = "administrateur/styleconnexion";

        // On retourne la vue 'commun/header' suivi de la vue 'administrateur/connexion' et 'commun/footer'
        return view("commun/header", $data) . view("administrateur/connexion") . view("commun/footer");
    }

    public function creation()
    {
        if (isset($_POST['creer'])) {
            // On établit une connexion à la base de données
            $db = \Config\Database::connect();

            // On vérifie si l'email saisi dans le formulaire existe déjà dans la base de données
            $administrateurQuery = $db->table('administrateur')->getWhere(["email_administrateur" => $_POST["email"]]);
            $administrateurResult = $administrateurQuery->getResult("array");

            // Si l'email existe déjà, on affiche un message d'erreur
            if (isset($administrateurResult[0])) {
                $data['error'] = "Email déjà existant";
            } else if ($_POST["pass"] === $_POST["confirmPass"]) {
                // Si les mots de passe saisis dans le formulaire correspondent
                // On prépare les données de l'administrateur à insérer dans la base de données
                $admin = [
                    "email_administrateur" => $_POST["email"],
                    "pass_administrateur" => password_hash($_POST["pass"], PASSWORD_DEFAULT),
                    "pseudo_administrateur" => $_POST["pseudo"]
                ];

                // On insère les données de l'administrateur dans la base de données
                $db = \Config\Database::connect();
                $db->table('administrateur')->insert($admin);

                // On redirige l'administrateur vers la page de connexion
                return redirect()->route("connexion_admin");
            } else {
                // Si les mots de passe ne correspondent pas, on affiche un message d'erreur
                $data['error'] = "Les mots de passes ne correspondent pas";
            }
        }

        // On prépare les données pour la vue de création d'administrateur
        $data['title'] = "Création admin";
        $data['css'] = "administrateur/stylecreation";

        // On retourne la vue 'commun/header' suivi de la vue 'administrateur/creation' et 'commun/footer'
        return view("commun/header", $data) . view("administrateur/creation") . view("commun/footer");
    }
}
