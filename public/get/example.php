<?php

ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );

# Requiring autoloader
require $_SERVER['DOCUMENT_ROOT'].'/autoloader.php';

# To get request parameters
$request = new \core\Request();

# Customized API Response
$response = new \core\Response();

$response->code(200);
$response->json(['success'=>'hello world!']);
$response->send();
