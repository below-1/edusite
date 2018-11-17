<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$is_dev_mode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/src/Edusite/Model'), $is_dev_mode);

// $conn = array(
//   'driver' => 'pdo_sqlite',
//   'path' => __DIR__ . '/db.sqlite'
// );
$conn = array(
  'dbname' => 'edusite_db',
  'user' => 'edusite_db',
  'password' => 'edusite_db',
  'host' => 'db4free.net',
  'driver' => 'pdo_mysql'
);

$entity_manager = EntityManager::create($conn, $config);

// Setting twig templates
$loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/templates');
$twig = new Twig_Environment($loader, array(
  'debug' => true
));