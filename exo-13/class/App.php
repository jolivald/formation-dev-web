<?php

namespace Jonathan\Classes;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * 
 */
class App {

  /**
   * @var EntityManager $entityManager Doctrine entity manager
   */
  protected static $entityManager;

  /**
   * Get $entityManager Doctrine entity manager
   *
   * @return EntityManager
   */
  public static function getEntityManager() {
    if (!self::$entityManager){
      $config = Setup::createAnnotationMetadataConfiguration(
        [__DIR__.'/../models'],
        true, // isDevMode
        null, // proxyDir
        null, // cache
        false // useSimpleAnnotationReader
      );
      $config->setProxyDir(__DIR__.'/proxies');
      $config->setProxyNamespace('Jonathan\Proxies');
      self::$entityManager = EntityManager::create(
        [
          'driver' => $_ENV['DB_DRIVER'],
          'user' => $_ENV['DB_USER'],
          'password' => $_ENV['DB_PASS'],
          'dbname' => $_ENV['DB_NAME']
        ],
        $config
      );
    }
    return self::$entityManager;
  }
  
}
