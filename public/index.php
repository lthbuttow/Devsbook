<?php
session_start();
header("Access-Control-Allow-Origin: *");
require '../vendor/autoload.php';
require '../src/routes.php';

$router->run( $router->routes );
