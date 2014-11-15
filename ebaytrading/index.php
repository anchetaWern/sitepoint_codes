<?php
session_start();
require 'vendor/autoload.php';


$app = New \SlimController\Slim(array(
    'templates.path' => 'templates'
));

$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);

$app->hook('slim.before', function () use ($app) {
    $app->view()->appendData(array('baseUrl' => '/tester/ebay_trading_api'));
});


$app->container->singleton('db', function () {

    $server = 'localhost';
    $user = 'user';
    $pass = '';
    $database = 'ebaytrading';

    return new mysqli($server, $user, $pass, $database);
    
});

$app->container->singleton('ebay', function () use($app) {

    $id = 1;
    $settings_result = $app->db->query("SELECT user_token, run_name, dev_id, app_id, cert_id, site_id FROM settings WHERE id = $id");
    $settings = $settings_result->fetch_object();
    return new Ebay($settings);
});


$app->addRoutes(array(
    '/' => 'Home:index',
    '/settings' => 'Settings:view',
    '/settings/update' => 'Settings:update',
    '/products/new' => 'Product:new',
    '/products/create' => 'Product:create',
    '/upload' => 'Product:upload',
    '/session' => 'Home:session',
    '/token' => 'Home:token',
    '/categories' => 'Product:categories'
));


$app->run();