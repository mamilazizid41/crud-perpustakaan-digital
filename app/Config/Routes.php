<?php

$routes->get('/', 'Buku::index');
$routes->match(['get', 'post'], 'auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('buku', 'Buku::index');
$routes->get('buku/create', 'Buku::create');
$routes->post('buku/store', 'Buku::store');
$routes->get('buku/edit/(:num)', 'Buku::edit/$1');
$routes->post('buku/update/(:num)', 'Buku::update/$1');
$routes->get('buku/delete/(:num)', 'Buku::delete/$1');
$routes->get('buku/detail/(:num)', 'Buku::detail/$1');
$routes->get('/buku/dashboard', 'Buku::dashboard');
$routes->presenter('buku');
