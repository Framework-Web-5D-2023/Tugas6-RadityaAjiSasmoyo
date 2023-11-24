<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Home
$routes->get('/', 'Home::index');
$routes->post('/create', 'Home::createMahasiswa');
$routes->get('/(:num)', 'Home::detailMahasiswa/$1');
$routes->get('/updateMahasiswa/(:num)', 'Home::updateMahasiswa/$1');

$routes->post('/updateMahasiswa/update/(:num)', 'Home::updateMahasiswaAction/$1');

// $routes->get('/delete/(:num)', 'Home::deleteMahasiswa/$1');
$routes->get("delete/(:num)", 'Home::deleteMahasiswa/$1');

// About
$routes->get('/about/(:num)/(:any)', 'About::create/$1/$2');

// Login
$routes->get('/login', 'Login::index');
$routes->post('/login/signin', 'Login::signin');

// Register
$routes->get('/login/signup', 'Login::signup');
$routes->post('/login/signup/create', 'Login::create_signup');

// Pertemuan 5 
$routes->get('/pertemuan5', 'Pertemuan5::index');
$routes->post('/pertemuan5/create', 'Pertemuan5::create');
