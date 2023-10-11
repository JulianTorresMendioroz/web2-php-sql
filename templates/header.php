<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo BASE_URL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Ecommerce</title>
</head>

<body>
    <header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="home">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="home">Home</a>
        <a class="nav-link active" href="category">Invierno</a>
        <a class="nav-link active" href="category">Verano</a>
        <div class="buttons"><?php if(isset($_SESSION['user'])&&($_SESSION['logged'] == true)&&($_SESSION['rol'] == 'user')){
          var_dump($_SESSION);
          ?>
           <a type="button" href="logout" class="btn btn-info">Salir - Usuario <?php echo $_SESSION['user'] ?></a>
           <?php
        } else if(isset($_SESSION['user'])&&($_SESSION['logged'] == true)&&($_SESSION['rol'] == 'admin')){
          ?>
          <a type="button" href="listar" class="btn btn-primary">Listar todos los productos</a>
          <a type="button" href="agregar" class="btn btn-success">Agregar productos</a>
          <a type="button" href="actualizar" class="btn btn-secondary">Actualizar productos</a>
          <a type="button" href="eliminar" class="btn btn-danger">Eliminar producto</a>
          <a type="button" href="logout" class="btn btn-info">Salir - Usuario <?php echo  $_SESSION['user'] ?></a>
          <?php
        } else {
      ?>
          <a type="button" href="register" class="btn btn-info">Registrarse</a>
          <a type="button" href="login" class="btn btn-warning">Ingresar</a>?>  
          <?php
        }?>
        </div>
      </div>
    </div>
  </div>
</nav>
    </header>

  <div class="div_title">
    <h4>Ecommerce WEB 2</h4>
    <p>"Slogan"</p>
  </div>

<main class="container mt-3">
