<?php

namespace Jonathan\Classes;

use Carbon\Carbon;
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

  /**
   * Check $_SESSION to check if user is authentified
   * 
   * @return boolean True if session is valid
   */
  public static function isAgentAuthentified() {
    return array_key_exists('logged', $_SESSION)
      && $_SESSION['logged'] === true;
  }

  /**
   * Twig filter used to add base URL before passed path
   * 
   * @param string $path Path to prepend base URL to
   * @return string Full URL with base prepended to path
   * @see Jonathan\Views\BaseView::__construct
   */
  public static function prependBaseUrl($path) {
     return str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).$path;
  }

  /**
   * Translate a date to french
   * 
   * @param DateTime $date Date to translate
   * @return string Formatted date string
   */
  public static function formatDate($date) {
    $carbon = new Carbon($date, 'Europe/Paris');
    $carbon->locale('fr');
    return implode(' ', [
      $carbon->dayName,
      $carbon->day,
      $carbon->monthName,
      $carbon->year
    ]);
  }
  
}
