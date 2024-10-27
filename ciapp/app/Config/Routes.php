<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(false);

service('auth')->routes($routes);


$routes->get('/', 'Home::index');
/*$routes->get('/Articles', 'Articles::index');
$routes->get('Articles/(:num)', 'Articles::show/$1');
$routes->get('Articles/new', 'Articles::new', ["as" => "new_article"]);*/
$routes->post("Articles/create", "Articles::create");
$routes->get("Articles/(:num)/edit", "Articles::edit/$1");
$routes->post("Articles/update/(:num)", "Articles::update/$1");

/*service('auth')->routes($routes);
$routes->match(["get", "post"], "Articles/delete/(:num)", "Articles::delete/$1");*/


$routes->resource("Articles", ["placeholder" =>"(:num)"]);
$routes->get("set-password", "Password::set");
$routes->post("set-password", "Password::update");