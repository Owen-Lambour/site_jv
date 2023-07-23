<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jeu extends BaseController
{
    public function listeAdmin()
    {
        $data['title'] = "Liste jeu";
        $datajeu['listeJeu'] = $this->selectionJeu();


        return view("commun/header", $data) . view("jeu/listeAdmin", $datajeu) . view("commun/footer");
    }

    public function listeJoueur()
    {
        $db = \Config\Database::connect();

        $data['title'] = "Liste jeu";
        $data['css'] = "jeu/liste";

        if (isset($_POST["chercherjeu"])) {

            $builder = $db->table('jeu')
                ->join("editeur", 'jeu.id_editeur=editeur.id_editeur')
                ->join("developpeur", 'jeu.id_developpeur=developpeur.id_developpeur');

            if (isset($_POST["titre"]) && !empty($_POST["titre"])) {
                $builder = $builder->where("nom_jeu LIKE", "%" . $_POST["titre"] . "%");
            }
            if (isset($_POST["date_sortie"]) && !empty($_POST["date_sortie"])) {
                $builder = $builder->where("date_jeu", $_POST["date_sortie"]);
            }

            if (isset($_POST["developpeur"]) && !empty($_POST["developpeur"])) {
                $builder = $builder->where("jeu.id_developpeur", $_POST["developpeur"]);
            }

            if (isset($_POST["editeur"]) && !empty($_POST["editeur"])) {
                $builder = $builder->where("jeu.id_editeur", $_POST["editeur"]);
            }

            $builder = $builder->get();
            $datajeu['listeJeu'] = $builder->getResult("array");
        } else {
            $datajeu['listeJeu'] = $this->selectionJeu();
        };

        $builder = $db->table('developpeur')
            ->get();

        $datarecherche['listeDeveloppeur'] = $builder->getResult("array");

        $builder = $db->table('editeur')
            ->get();

        $datarecherche['listeEditeur'] = $builder->getResult("array");


        return view("commun/header", $data) . view("jeu/recherche", $datarecherche) . view("jeu/listeJoueur", $datajeu) . view("commun/footer");
    }

    function selectionJeu()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('jeu')
            ->join("editeur", 'jeu.id_editeur=editeur.id_editeur')
            ->join("developpeur", 'jeu.id_developpeur=developpeur.id_developpeur')
            // ->join("support", 'jeu.id_jeu=support.id_jeu')
            // ->join("plateforme", 'plateforme.id_plateforme=support.id_plateforme')
            ->get();

        return $builder->getResult("array");
    }

    public function editer($id)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('jeu')
            ->join("editeur", 'jeu.id_editeur=editeur.id_editeur')
            ->join("developpeur", 'jeu.id_developpeur=developpeur.id_developpeur')
            // ->join("support", 'jeu.id_jeu=support.id_jeu')
            // ->join("plateforme", 'plateforme.id_plateforme=support.id_plateforme')
            ->getWhere(["jeu.id_jeu" => $id]);

        $datajeu['jeu'] = $builder->getResult("array");
        $datajeu['jeu'] = $datajeu['jeu'][0];

        $builder = $db->table('developpeur')
            ->get();

        $datajeu['listeDeveloppeur'] = $builder->getResult("array");

        $builder = $db->table('editeur')
            ->get();

        $datajeu['listeEditeur'] = $builder->getResult("array");
        if (isset($_POST['modifier'])) {
            $jeu = [
                "id_jeu" => $id,
                "nom_jeu" =>  $_POST["titre"],
                "date_jeu" => $_POST["date_sortie"],
                "sypnosis_jeu" => $_POST["description"],
                "id_developpeur" => $_POST["id_developpeur"],
                "id_editeur" => $_POST["id_editeur"]
            ];

            $jeuQuery = $db->table('jeu')->replace($jeu);
        }

        $data['title'] = "gestion jeu";
        $data['css'] = "jeu/liste";

        return view("commun/header", $data) . view("jeu/editerJeu", $datajeu) . view("commun/footer");

        /*
        récupérer un jeu en fonction de son ID (get de la base de donnée) (tout est dans utilisateur connexion, à modifier par ID)
        créer le formulaire d'édition (view)
        envoyer la variable  à la vue (return view)
        remplir le formulaire édition avec les données 
        gérer l'update du formulaire (if (isset($_PUT)) )
        envoyer les données à la base
        */
    }


    public function creer()
    {
        /*créer formulaire d'édition
        gérer envoi du formulaire
        envoyer la création à la BDD (comme inscription admin)
        */
    }

    public function afficher($id)
    {

        echo $id;


        /*selectionner un jeu en fonction de son ID,
        join commentaire.id_jeu = jeu.id_jeu,
        join commentaire.id_joueur = joueur.id_joueur,

        afficher la page du jeu en question,
        afficher les commentaires,
        vérifier si le joueur a un commentaire -> bloquer si oui,
        poster un commentaire if(isset($_POST["commenter"])),
        */
    }
}
