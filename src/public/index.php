<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';

$app = new \Slim\App;

//Define dependency container
require_once '../includes/container.php';

// Define app routes
require_once '../includes/routes.php';

// Run app
$app->run();