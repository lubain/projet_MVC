<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Get
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::login');
$routes->get('logout', 'Login::logout');
$routes->get('chats', 'Message::index');
$routes->get('chats/(:num)', 'Message::openChat/$1');
$routes->get('register', 'Home::register');
$routes->get('profile/(:num)', 'Home::profile/$1');
$routes->get('delete/(:num)', 'Home::deletePublication/$1');

// Post
$routes->post('login', 'Login::check');
$routes->post('/', 'Home::postHome');
$routes->post('chats/(:num)', 'Message::sendMessage/$1');
$routes->post('register', 'Home::addUser');