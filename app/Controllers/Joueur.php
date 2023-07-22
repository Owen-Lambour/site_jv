<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Joueur extends BaseController
{
    public function index()
    {
        //
    }
    public function connexion()
    {
        if (isset($_POST["connecter"])) {

            $db = \Config\Database::connect();
            $joueurQuery = $db->table('joueur')->getWhere(["email_joueur" => $_POST["email"]]);
            $joueurResult = $joueurQuery->getResult("array");

            if (isset($joueurResult[0])) {
                if (password_verify($_POST["pass"], $joueurResult[0]["pass_joueur"])) {
                    setcookie("CONNEXIONJOUEUR", true, time() + 36000);
                    setcookie("id_joueur", $joueurResult[0]["id_joueur"], time() + 36000);

                    return redirect()->route("liste_joueur");
                } else {
                    $data['error'] = "Le mot de passe est invalide";
                }
            } else {
                $data['error'] = "Le mail est invalide";
            }
        }


        $data['title'] = "Connexion";
        $data['css'] = "joueur/stylecreation";
        return view("commun/header", $data) . view("joueur/connexion") . view("commun/footer");
    }

    public function creation()
    {

        if (isset($_POST['creer'])) {

            $db = \Config\Database::connect();
            $joueurQuery = $db->table('joueur')->getWhere(["email_joueur" => $_POST["email"]]);
            $joueurResult = $joueurQuery->getResult("array");
            if (isset($joueurResult[0])) {
                $data['error'] = "Email déjà existant";
            } else if ($_POST["pass"] === $_POST["confirmPass"]) {

                $joueur = [
                    "email_joueur" => $_POST["email"],
                    "pass_joueur" => password_hash($_POST["pass"], PASSWORD_DEFAULT),
                    "pseudo_joueur" => $_POST["pseudo"]
                ];

                $db = \Config\Database::connect();
                $db->table('joueur')->insert($joueur);
                return redirect()->route("connexion_joueur");
            } else {
                $data['error'] = "Les mots de passes ne correspondent pas";
            }
        }
        $data['title'] = "Inscription";
        $data['css'] = "joueur/stylecreation";
        return view("commun/header", $data) . view("joueur/creation") . view("commun/footer");
    }
}
