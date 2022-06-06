<?php

require_once "vendor/autoload.php";

use App\modules\home\controller\IndexController as AppHome;
use System\modules\home\controller\IndexController as AdminHome;
use System\modules\CSVUploader\controller\FileUploader;

// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
    'displayErrorDetails' => true,
]];
$app = new \Slim\App($config);

// Define app routes
$app->get('/', AppHome::class . ':index');


$app->get('/admin', AdminHome::class . ':index');
$app->get('/admin/upload', FileUploader::class . ':getFile');
$app->post('/admin/upload', FileUploader::class . ':postFile');

// Run app
$app->run();