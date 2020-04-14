<?php

// utilise l'autoload fournit par composer
$loader = require __DIR__.'/vendor/autoload.php';

// ajoute notre namespace à l'autoload
$loader->addPsr4('Jonathan\\classes\\', __DIR__.'/classes/');
$loader->addPsr4('Jonathan\\controllers\\', __DIR__.'/controllers/');
$loader->addPsr4('Jonathan\\models\\', __DIR__.'/models/');
$loader->addPsr4('Jonathan\\views\\', __DIR__.'/views/');

// charge les infos sensibles depuis le fichier .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
