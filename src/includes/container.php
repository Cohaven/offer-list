<?php

use App\Repository\OfferRepository;
use App\Controller\OfferController;
use App\Adapter\JsonFileAdapter;
use App\Mapper\OfferMapper;

//Define dependency container and dependencies that it holds for injection
$container = $app->getContainer();

$container['view'] = function ($container) {
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader, [
        'debug' => 'true',
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());

    return $twig;
};

$container['JsonFileAdapter'] = function($c) {
    return new JsonFileAdapter();
};

$container['OfferMapper'] = function($c) {
    return new OfferMapper($c->get("JsonFileAdapter"));
};

$container['OfferRepository'] = function($c) {
    return new OfferRepository($c->get("OfferMapper"));
};

$container['OfferController'] = function($c) {
    return new OfferController($c->get("view"), $c->get("OfferRepository"));
};