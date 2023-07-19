<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jeu extends BaseController
{
    public function listeAdmin()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('jeu')
            ->join("editeur", 'jeu.id_editeur=editeur.id_editeur')
            ->join("developpeur", 'jeu.id_developpeur=developpeur.id_developpeur')
            // ->join("support", 'jeu.id_jeu=support.id_jeu')
            // ->join("plateforme", 'plateforme.id_plateforme=support.id_plateforme')
            ->get();




        $listeJeu = $builder->getResult("array");

        $data['title'] = "Liste jeu";
        $datajeu['listeJeu'] = $listeJeu;

        return view("commun/header", $data) . view("jeu/listeAdmin", $datajeu) . view("commun/footer");
    }
    public function editer($id)
    {
        echo $id;

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
}
