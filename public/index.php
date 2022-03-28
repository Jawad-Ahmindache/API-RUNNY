<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


// # include the Slim framework
require '../vendor/autoload.php';

// # include DB connection file
require '../src/db_connect.php';

//Fonctions globales de notre projet
require "functions.php";

$app = new \Slim\App;


//Include SLIMAPI module file
require '../src/login.php';

//Lister les courses
require '../src/liste_course.php';

//Requete sur une seule course
require '../src/courses.php';

//Lister les performances et les trier de la meilleure à la moins bonne
require '../src/liste_performances.php';

//Lister les performances et les trier de la meilleure à la moins bonne
require '../src/newcourse.php';
$app->run();
?>