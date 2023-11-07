<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\NewsController; // Add this line
use App\Controllers\PagesController;
use App\Controllers\UserCrud;

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('UsersController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'UsersController::index', ['filter' => 'noauth']);
$routes->get('logout', 'UsersController::logout');
$routes->match(['get','post'],'register', 'UsersController::register', ['filter' => 'noauth']);
$routes->match(['get','post'],'profile', 'UsersController::profile',['filter' => 'auth']);
$routes->get('dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('admin', 'Home::index');
$routes->get('admin/profile', 'Home::profile');
$routes->get('admin/dashboard', 'Home::dashboard');
$routes->get('admin/dashboard/v2', 'Home::dashboard2');
$routes->get('admin/dashboard/v3', 'Home::dashboard3');
$routes->get('admin/contacts', 'Home::contacts');
$routes->get('admin/calendar', 'Home::calendar');
$routes->get('admin/404', 'Home::pages404');

$routes->group('admin', static function ($routes) {
    $routes->group('projects', static function ($routes) {
        $routes->get('/', 'Home::pagesProjects');
        $routes->get('add', 'Home::pagesProjectsAdd');
        $routes->get('edit', 'Home::pagesProjectsEdit');
    });
});

$routes->group('admin', static function ($routes) {
    $routes->group('tables', static function ($routes) {
        $routes->get('/', 'Home::pagesTables');
        $routes->get('data', 'Home::pagesTablesData');
    });
});

/*$routes->get('/', 'AuthController::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/login/auth', 'AuthController::doLogin');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->get('/dashboard', 'AuthController::dashboard');
$routes->post('/register/auth', 'AuthController::doRegister');*/

// $routes->get('/', 'SiteController::index');
// $routes->get('about-us', 'SiteController::aboutUs');

// CRUD Routes
$routes->get('users-list', 'UserCrud::index');
$routes->get('user-form', 'UserCrud::create');
$routes->post('submit-form', [UserCrud::class, 'store']);
// $routes->get('edit-view/(:num)', 'UserCrud::singleUser/$1');
$routes->get('edit-view/(:num)', [UserCrud::class, 'singleUser/$1']);
$routes->post('update', 'UserCrud::update');
$routes->get('delete/(:num)', 'UserCrud::delete/$1');

$routes->get('news', [NewsController::class, 'index']);           // Add this line
$routes->get('news/new', [NewsController::class, 'new']); // Add this line
$routes->post('news', [NewsController::class, 'create']); // Add this line
$routes->get('news/(:segment)', [NewsController::class, 'show']); // Add this line
// $routes->get('news/(:any)', 'NewsController::show/$1');

$routes->get('pages', [PagesController::class, 'index']);
$routes->get('(:segment)', [PagesController::class, 'view']);