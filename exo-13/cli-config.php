<?php
use Dotenv\Dotenv;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Jonathan\Classes\App;

// utilise l'autoload fournit par composer
require __DIR__.'/vendor/autoload.php';

// charge les infos sensibles depuis le fichier .env
Dotenv::createImmutable(__DIR__)->load();

// paramètre la console avec notre entity manager
return ConsoleRunner::createHelperSet(
  App::getEntityManager()
);
