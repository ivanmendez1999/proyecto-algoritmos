<?php

namespace Admin\Config;

use Config\Services; 

$routes = Services::routes();

    $routes->get("admin/users", "\Admin\Controllers\Users::index");
    $routes->get("admin/users/(:num)", "Users::show/$1", ["namespace" => "Admin\Controllers"]);
    $routes->post("admin/users/(:num)/toggle-ban", "Users::toggleBan/$1",  ["namespace" => "Admin\Controllers"]);