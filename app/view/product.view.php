<?php

class ProductView{

    public function showAllProducts($products){

        require_once('templates/header.php');

        foreach($products as $product) {
            ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $product->img ?>" class="card-img-top" alt="imageProduct">
        <div class="card-body">
        <h5 class="card-title"></h5>
        <a href="descripcion/<?php echo $product->id ?>" class="btn btn-primary">Ver detalles</a>
        <?php
        if(isset($_SESSION['user'])&&($_SESSION['logged'] == true)&&($_SESSION['rol'] == 'admin')){
            ?>
        <a href="eliminar/<?php echo $product->id ?>" class="btn btn-danger">Eliminar producto</a>
    <?php
        }
    ?>
        </div>
    </div>
<?php 
        }
        
        require_once 'templates/add_prod.php';
        
        require_once('templates/footer.php');

    }

    public function showDescriptionProduct($product){

        require_once('templates/header.php');
            ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $product->img ?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Producto: <?php echo $product->name ?></h5>
        <h5 class="card-title">Descripción: <?php echo $product->description ?></h5>
        <h5 class="card-title">Precio: $ <?php echo $product->price ?></h5>
        </div>
    </div>
<?php 
        

        require_once('templates/footer.php');
    }

    



}