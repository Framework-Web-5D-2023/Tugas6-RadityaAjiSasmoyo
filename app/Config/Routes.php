<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'ExtendsController::home');
$routes->post('/create', 'ExtendsController::createMahasiswa');
$routes->get('/(:num)', 'ExtendsController::detailMahasiswa/$1');

$routes->get('/updateMahasiswa/(:num)', 'ExtendsController::updateMahasiswa/$1');
$routes->post('/updateMahasiswa/update/(:num)', 'ExtendsController::updateMahasiswaAction/$1');
$routes->get("delete/(:num)", 'ExtendsController::deleteMahasiswa/$1');

// About
$routes->get('/about', 'ExtendsController::profile');
# $routes->get('/about/(:num)/(:any)', 'About::create/$1/$2');

// Login
$routes->get('/login', 'ExtendsController::index');
$routes->post('/login/signin', 'ExtendsController::signin');
// Register
$routes->get('/login/signup', 'ExtendsController::signup');
$routes->post('/login/signup/create', 'ExtendsController::create_signup');

// Pertemuan 5 
$routes->get('/pertemuan5', 'ExtendsController::index2');
$routes->post('/pertemuan5/create', 'ExtendsController::create');
