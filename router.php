<?php

require_once 'MVC/controller/ProductController.php';
require_once 'MVC/controller/LoginController.php';
require_once 'MVC/controller/UserController.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action); 

$ProductController = new ProductController();
$AuthController = new LoginController();
$UserController = new UserController();


switch ($params[0]) {
    case 'login':
        $AuthController->showLogin();
     break;
     case 'register':
        $AuthController->showRegister();
     break;
     case 'registered':
        $UserController->registered();
     break;
     case 'logged':
        $UserController->logged();
     break;
     case 'logout':
        $UserController->logout();
     break;
     case 'user':
        $UserController->logged();
     break;
    case 'home':
       $ProductController->showAllProducts();
    break;
    case 'descripcion':
        $ProductController->showDescriptionProduct($params[1]);
    break;
    default: 
        echo "404 Page Not Found";
        break;
}
