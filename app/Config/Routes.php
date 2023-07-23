<?php

namespace Config;

use App\Controllers\Administrateur;
use App\Controllers\Jeu;
use App\Controllers\Joueur;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', [Administrateur::class, 'index']);

$routes->get('/admin/connexion', [Administrateur::class, 'connexion'], ["as" => "connexion_admin"]);
$routes->post('/admin/connexion', [Administrateur::class, 'connexion'], ["as" => "connexion_admin"]);

$routes->get('/admin/creation', [Administrateur::class, 'creation'], ["as" => "creation_admin"]);
$routes->post('/admin/creation', [Administrateur::class, 'creation'], ["as" => "creation_admin"]);

$routes->get('/jeu/liste-admin', [Jeu::class, 'listeAdmin'], ["as" => "liste_admin"]);
$routes->get('/jeu/editer/(:segment)', [Jeu::class, 'editer'], ["as" => "editer_jeu"]);
$routes->post('/jeu/editer/(:segment)', [Jeu::class, 'editer'], ["as" => "editer_jeu"]);

$routes->get('/joueur/creation', [Joueur::class, 'creation'], ["as" => "creation_joueur"]);
$routes->post('/joueur/creation', [Joueur::class, 'creation'], ["as" => "creation_joueur"]);

$routes->get('/joueur/connexion', [Joueur::class, 'connexion'], ["as" => "connexion_joueur"]);
$routes->post('/joueur/connexion', [Joueur::class, 'connexion'], ["as" => "connexion_joueur"]);

$routes->get('jeu/liste', [Jeu::class, 'listeJoueur'], ["as" => "liste_joueur"]);
$routes->post('jeu/liste', [Jeu::class, 'listeJoueur'], ["as" => "liste_joueur"]);

$routes->get('/jeu/afficher/(:segment)', [Jeu::class, 'afficher'], ["as" => "afficher_jeu"]);



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
