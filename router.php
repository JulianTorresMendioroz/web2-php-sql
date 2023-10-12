<?php

require_once 'app/controller/product.controller.php';
require_once 'app/controller/auth.controller.php';
require_once 'app/controller/admin.controller.php';
require_once 'app/helpers/auth.helpers.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action); 

$ProductController = new ProductController();
$AuthController = new AuthController();
$AdminController = new AdminController();
$AuthHelper = new AuthHelper();

switch ($params[0]) {
    case 'login':
        $AuthController->showLogin();
     break;
     case 'register':
        $AuthController->showRegister();
     break;
     case 'registered':
        $AuthController->registered();
     break;
     case 'logged':
        $AuthController->logged();
     break;
     case 'logout':
        $AuthHelper->logout();
     break;
    case 'home':
       $ProductController->showAllProducts();
    break;
    case 'descripcion':
        $ProductController->showDescriptionProduct($params[1]);
    break;
    case 'listar':
      $AdminController->showListProds();
   break;
    case 'agregar':
      $AdminController->showFormAddProduct();
   break;
    case 'agregarProducto':
      $AdminController->addProduct();
   break;
   case 'actualizar':
      $AdminController->addProduct();
   break;
   case 'eliminar':
      $AdminController->showDeleteProds();
   break;
   case 'eliminarProducto':
      $AdminController->deleteProductById($params[1]);
   break;
<<<<<<< HEAD
=======
   // case 'category':
   //    $categoryController->showCategoryBySeason();
   case 'listarCategoria':
      $AdminController->showListCat();
   break;
    case 'agregaCategoria':
      $AdminController->showFormAddCategory();
   break;
    case 'agregarCategoria':
      $AdminController->addCategory();
   break;
   // case 'actualizarCategoria':
   // $AdminController->updateCategory();
   break;
   case 'eliminarCategoria':
      $AdminController->showDeleteCat();
   break;
   case 'eliminarCategoria':
      $AdminController->deleteCategoryById($params[1]);
   break;

   

>>>>>>> 521e86da14f1bf704e9fc93ebab47a9a41fde41c
    default: 
        echo "404 Page Not Found";
        break;
}
