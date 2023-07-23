<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jeu extends BaseController
{
    // Méthode pour afficher la liste des jeux pour les administrateurs
    public function listeAdmin()
    {
        // Préparation des données pour la vue
        $data['title'] = "Liste jeu";
        $datajeu['listeJeu'] = $this->selectionJeu();

        // On retourne la vue 'commun/header' suivi de la vue 'jeu/listeAdmin' et 'commun/footer'
        return view("commun/header", $data) . view("jeu/listeAdmin", $datajeu) . view("commun/footer");
    }

    // Méthode pour afficher la liste des jeux pour les joueurs
    public function listeJoueur()
    {
        // Connexion à la base de données
        $db = \Config\Database::connect();

        // Préparation des données pour la vue
        $data['title'] = "Liste jeu";
        $data['css'] = "jeu/liste";

        // Gestion de la recherche de jeux
        if (isset($_POST["chercherjeu"])) {
            // Construction de la requête SQL en fonction des critères de recherche saisis par l'utilisateur
            $builder = $db->table('jeu')
                ->join("editeur", 'jeu.id_editeur=editeur.id_editeur')
                ->join("developpeur", 'jeu.id_developpeur=developpeur.id_developpeur');

            if (isset($_POST["titre"]) && !empty($_POST["titre"])) {
                $builder = $builder->where("nom_jeu LIKE", "%" . $_POST["titre"] . "%");
            }
            if (isset($_POST["date_sortie"]) && !empty($_POST["date_sortie"])) {
                $builder = $builder->where("date_jeu", $_POST["date_sortie"]);
            }
            // ... Autres critères de recherche ...

            // Exécution de la requête SQL
            $builder = $builder->get();
            $datajeu['listeJeu'] = $builder->getResult("array");
        } else {
            // Si aucune recherche n'est effectuée, afficher tous les jeux
            $datajeu['listeJeu'] = $this->selectionJeu();
        }

        // Récupération des développeurs et des éditeurs pour le formulaire de recherche
        $builder = $db->table('developpeur')->get();
        $datarecherche['listeDeveloppeur'] = $builder->getResult("array");

        $builder = $db->table('editeur')->get();
        $datarecherche['listeEditeur'] = $builder->getResult("array");

        // On retourne la vue 'commun/header' suivi des vues 'jeu/recherche', 'jeu/listeJoueur' et 'commun/footer'
        return view("commun/header", $data) . view("jeu/recherche", $datarecherche) . view("jeu/listeJoueur", $datajeu) . view("commun/footer");
    }

    // Méthode pour récupérer la liste de tous les jeux
    function selectionJeu()
    {
        // Connexion à la base de données
        $db = \Config\Database::connect();

        // Construction de la requête SQL pour récupérer tous les jeux avec les informations sur les éditeurs et les développeurs
        $builder = $db->table('jeu')
            ->join("editeur", 'jeu.id_editeur=editeur.id_editeur')
            ->join("developpeur", 'jeu.id_developpeur=developpeur.id_developpeur')
            ->get();

        // Exécution de la requête SQL et retour des résultats sous forme de tableau associatif
        return $builder->getResult("array");
    }

    // Méthode pour éditer un jeu en fonction de son ID
    public function editer($id)
    {
        // Connexion à la base de données
        $db = \Config\Database::connect();

        // Construction de la requête SQL pour récupérer le jeu en fonction de son ID avec les informations sur les éditeurs et les développeurs
        $builder = $db->table('jeu')
            ->join("editeur", 'jeu.id_editeur=editeur.id_editeur')
            ->join("developpeur", 'jeu.id_developpeur=developpeur.id_developpeur')
            ->getWhere(["jeu.id_jeu" => $id]);

        // Exécution de la requête SQL et récupération du jeu sous forme de tableau associatif
        $datajeu['jeu'] = $builder->getResult("array");
        $datajeu['jeu'] = $datajeu['jeu'][0];

        // Récupération des développeurs et des éditeurs pour le formulaire d'édition
        $builder = $db->table('developpeur')->get();
        $datajeu['listeDeveloppeur'] = $builder->getResult("array");

        $builder = $db->table('editeur')->get();
        $datajeu['listeEditeur'] = $builder->getResult("array");

        // Gestion de la modification du jeu
        if (isset($_POST['modifier'])) {
            // Construction du tableau de données pour la mise à jour du jeu dans la base de données
            $jeu = [
                "id_jeu" => $id,
                "nom_jeu" =>  $_POST["titre"],
                "date_jeu" => $_POST["date_sortie"],
                "sypnosis_jeu" => $_POST["description"],
                "id_developpeur" => $_POST["id_developpeur"],
                "id_editeur" => $_POST["id_editeur"]
            ];

            // Mise à jour du jeu dans la base de données
            $jeuQuery = $db->table('jeu')->replace($jeu);
        }

        // Préparation des données pour la vue
        $data['title'] = "gestion jeu";
        $data['css'] = "jeu/liste";

        // On retourne la vue 'commun/header' suivi de la vue 'jeu/editerJeu' et 'commun/footer'
        return view("commun/header", $data) . view("jeu/editerJeu", $datajeu) . view("commun/footer");
    }

    // Autres méthodes pour la création d'un jeu, l'affichage d'un jeu en fonction de son ID, etc.

}
