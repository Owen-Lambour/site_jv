<?php

namespace App\Controllers;

use App\Models\Administrateur as ModelsAdministrateur;

class Administrateur extends BaseController
{

    public function index()
    {
    }

    public function liste()
    {
        $model = model(ModelsAdministrateur::class);
        $data['listeAdmin'] = $model->findAdmins();
        return view('administrateur/liste', $data);
    }

    public function connexion()
    {
        if (isset($_POST["connecter"])) {

            /*récupérer l'utilisateur en fonction de son email
            vérifier le mot de passe
            faire les cookies
            rediriger vers l'accueil*/



            $db = \Config\Database::connect();
            $administrateurQuery = $db->table('administrateur')->getWhere(["email_administrateur" => $_POST["email"]]);
            $administrateurResult = $administrateurQuery->getResult("array");

            if (isset($administrateurResult[0])) {
                if (password_verify($_POST["pass"], $administrateurResult[0]["pass_administrateur"])) {
                    setcookie("isConnected", true, time() + 36000);
                } else {
                    $data['error'] = "Le mot de passe est invalide";
                }
            } else {
                $data['error'] = "Le mail est invalide";
            }
        }


        $data['title'] = "Avis jv - Connexion admin";
        return view('administrateur/connexion', $data);
    }

    public function creation()
    {
        if (isset($_POST['creer'])) {

            if ($_POST["pass"] === $_POST["confirmPass"]) {

                $admin = [
                    "email_administrateur" => $_POST["email"],
                    "pass_administrateur" => password_hash($_POST["pass"], PASSWORD_DEFAULT),
                    "pseudo_administrateur" => $_POST["pseudo"]
                ];

                $db = \Config\Database::connect();
                $db->table('administrateur')->insert($admin);
                return redirect()->route("connexion_admin");
            } else {
                $data['error'] = "Les mots de passes ne correspondent pas";
            }
        }
        $data['title'] = "Avis jv - Création admin";
        $data['css'] = "administrateur/stylecreation";
        return view("commun/header", $data) . view("administrateur/creation") . view("commun/footer");
    }
}
