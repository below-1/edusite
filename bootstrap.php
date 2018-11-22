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
$DB_NAME = 'edusite_db';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$conn = array(
  'dbname' => $DB_NAME,
  'user' => $DB_USER,
  'password' => $DB_PASSWORD,
  'host' => $DB_HOST,
  'driver' => 'pdo_mysql'
);

$entity_manager = EntityManager::create($conn, $config);

// Setting twig templates
$loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/templates');
$twig = new Twig_Environment($loader, array(
  'debug' => true
));