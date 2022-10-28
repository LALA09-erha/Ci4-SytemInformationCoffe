<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('/');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

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

// route for Index
$routes->get('/', 'HomeController::index');

//route for Menu Kedai Kopi
$routes->get('/kedai', 'KedaiController::index');

// route for Detail Kedai Kopi
$routes->get('kedai/(:any)', 'KedaiController::detailKedai/$1');

// route for process review
$routes->post('/prosesreview', 'KedaiController::processReview');

// route for menu contact
$routes->get('/contact', 'ContactController::index');

// route for process contact
$routes->post('/prosespesan', 'ContactController::processContact');

//route for search kedai
$routes->post('/carikedai', 'HomeController::searchKedai');

// route for sign in
$routes->get('/login', 'SignController::index');

// route for process sign in
$routes->post('/proseslogin', 'SignController::processLogin');

//route for sign up
$routes->get('/regist', 'SignController::regist');

// route for process sign up
$routes->post('/prosesregist', 'SignController::processRegist');

// route for dashboard
$routes->get('/dashboard', 'AdminController::index');

// route for logout
$routes->get('/logout', 'SignController::logout');

// route for menu kedai
$routes->get('/menu', 'AdminController::menuKedai');

//route for reviewmenu
$routes->get('/review', 'AdminController::reviewMenu');

//route for change info
$routes->get('/info', 'AdminController::changeInfo');

//route for process change info
$routes->post('/prosesinfo', 'AdminController::processInfo');

//route for image upload

$routes->post('/imagecafe', 'AdminController::uploadImage');

//route for add menu
$routes->get('/add-menu', 'MenuController::index');

//route for process add menu
$routes->post('/prosesaddmenu', 'MenuController::processAddMenu');

//route for edit menu
$routes->get('/editmenu/(:any)', 'MenuController::editMenu/$1');

//route for process edit menu
$routes->post('/proseseditmenu', 'MenuController::processEditMenu');

//route for delete menu
$routes->get('/hapusmenu/(:any)', 'MenuController::deleteMenu/$1');


// ADMIN ROUTE FOR KEDAI
// route for cafes
$routes->get('/data-cafe', 'AdminController::datacafe');

//route for delete deletereview
$routes->get('/deletereview/(:any)', 'AdminController::deleteReview/$1');

// route for delete cafe
$routes->get('/deletecafe/(:any)', 'AdminController::deleteCafe/$1');

// route for admin menu
$routes->get('/admin', 'AdminController::adminMenu');

// route for delete admin
$routes->get('/deleteadmin/(:any)', 'AdminController::deleteAdmin/$1');

// route for add admin
$routes->get('/add-admin', 'AdminController::addAdmin');

// route for process add admin
$routes->post('/prosesaddadmin', 'AdminController::processAddAdmin');

// route for menu Message
$routes->get('/message', 'AdminController::message');

//route for proses delete message
$routes->get('/deletemessage' , 'AdminController::deleteMessage');


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
