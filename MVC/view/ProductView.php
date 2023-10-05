<?php

require_once 'MVC/view/view.php';

class ProductView extends View {

    public function showAllProducts($products){

        require_once('templates/header_user.php');

        foreach($products as $product) {
            ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $product->img ?>" class="card-img-top" alt="imageProduct">
        <div class="card-body">
        <h5 class="card-title"><?php echo $product->name ?></h5>
        <a href="descripcion/<?php echo $product->id ?>" class="btn btn-primary">Ver detalles</a>
        </div>
    </div>
<?php 
        }

        require_once('templates/footer.php');

    }

    public function showDescriptionProduct($product){

        require_once('templates/header_user.php');
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