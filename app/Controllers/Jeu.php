<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jeu extends BaseController
{
    // Méthode pour afficher la liste des jeux pour les administrateurs
    public function listeAdmin()
    {
        $db = \Config\Database::connect();

        // Préparation des données pour la vue
        $data['title'] = "Liste jeu";
        $datajeu['listeJeu'] = $this->selectionJeu();

        // Gestion de la recherche de jeux
        if ($this->request->getPost("chercherjeu")) {
            // Construction de la requête SQL en fonction des critères de recherche saisis par l'utilisateur
            $builder = $db->table('jeu')
                ->join("editeur", 'jeu.id_editeur=editeur.id_editeur')
                ->join("developpeur", 'jeu.id_developpeur=developpeur.id_developpeur');

            if ($this->request->getPost("titre") && !empty($this->request->getPost("titre"))) {
                $builder = $builder->like("nom_jeu", "%" . $this->request->getPost("titre") . "%");
            }
            if ($this->request->getPost("date_sortie") && !empty($this->request->getPost("date_sortie"))) {
                $builder = $builder->where("date_jeu", $this->request->getPost("date_sortie"));
            }
            if ($this->request->getPost("developpeur") && !empty($this->request->getPost("developpeur"))) {
                $builder = $builder->where("jeu.id_developpeur", $this->request->getPost("developpeur"));
            }

            if ($this->request->getPost("editeur") && !empty($this->request->getPost("editeur"))) {
                $builder = $builder->where("jeu.id_editeur", $this->request->getPost("editeur"));
            }

            // Exécution de la requête SQL
            $builder = $builder->get();
            $datajeu['listeJeu'] = $builder->getResult("array");
        }

        // Récupération des développeurs et des éditeurs pour le formulaire de recherche
        $builder = $db->table('developpeur')->get();
        $datarecherche['listeDeveloppeur'] = $builder->getResult("array");

        $builder = $db->table('editeur')->get();
        $datarecherche['listeEditeur'] = $builder->getResult("array");

        // On retourne la vue 'commun/header' suivi de la vue 'jeu/rechercheAdmin', 'jeu/listeAdmin' et 'commun/footer'
        return view("commun/header", $data) . view("jeu/rechercheAdmin", $datarecherche) . view("jeu/listeAdmin", $datajeu) . view("commun/footer");
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
            if (isset($_POST["developpeur"]) && !empty($_POST["developpeur"])) {
                $builder = $builder->where("jeu.id_developpeur", $_POST["developpeur"]);
            }

            if (isset($_POST["editeur"]) && !empty($_POST["editeur"])) {
                $builder = $builder->where("jeu.id_editeur", $_POST["editeur"]);
            }

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


        /*
        récupérer un jeu en fonction de son ID (get de la base de donnée) (tout est dans utilisateur connexion, à modifier par ID)
        créer le formulaire d'édition (view)
        envoyer la variable  à la vue (return view)
        remplir le formulaire édition avec les données 
        gérer l'update du formulaire (if (isset($_PUT)) )
        envoyer les données à la base
        */
    }
    public function afficher($id)
    {
        // Connexion à la base de données
        $db = \Config\Database::connect();

        // Construction de la requête SQL pour récupérer le jeu en fonction de son ID avec les informations sur les éditeurs et les développeurs
        $builder = $db->table('jeu')
            ->join("editeur", 'jeu.id_editeur=editeur.id_editeur')
            ->join("developpeur", 'jeu.id_developpeur=developpeur.id_developpeur')
            ->where('jeu.id_jeu', $id)
            ->get();

        // Vérifier si le jeu existe
        if ($builder->getNumRows() === 0) {
            // Affiche une page 404 si le jeu n'existe pas
            return $this->response->setStatusCode(404)->setBody(view('errors/html/error_404'));
        }

        // Récupération du jeu sous forme de tableau associatif
        $jeu = $builder->getRowArray();

        // Construction de la requête SQL pour récupérer les commentaires associés à ce jeu
        $builder = $db->table('commentaire')
            ->join('joueur', 'commentaire.id_joueur = joueur.id_joueur')
            ->where('id_jeu', $id)
            ->get();

        // Récupération des commentaires sous forme de tableau associatif
        $commentaires = $builder->getResultArray();

        // Vérifier si le joueur est connecté et s'il a déjà posté un commentaire pour ce jeu
        $joueur_id = session('id_joueur');
        $joueur_commentaire_existe = false;
        if ($joueur_id) {
            $builder = $db->table('commentaire')
                ->where('id_joueur', $joueur_id)
                ->where('id_jeu', $id)
                ->get();
            if ($builder->getNumRows() > 0) {
                $joueur_commentaire_existe = true;
            }
        }

        // Charger la vue pour afficher les détails du jeu et les commentaires
        $data['title'] = "gestion jeu";
        $data['css'] = "jeu/liste";
        $data['jeu'] = $jeu;
        $data['commentaires'] = $commentaires;
        $data['joueur_commentaire_existe'] = $joueur_commentaire_existe;

        return view("commun/header", $data) . view("jeu/avisjoueur", $data) . view("commun/footer");
    }
}
