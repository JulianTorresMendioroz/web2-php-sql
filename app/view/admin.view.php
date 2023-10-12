<?php

class AdminView
{

    private $controller;

    public function showFormAddProduct()
    {

        require_once 'templates/header.php';

?>
        <form action="agregarProducto" method="POST">
            <h2>Agregar Producto:</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Imagen</label>
                <input type="text" name="img" class="form-control" aria-describedby="emailHelp">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                <label for="exampleInputEmail1">Descripcion</label>
                <input type="text" name="description" class="form-control" aria-describedby="emailHelp">
                <label for="exampleInputEmail1">Precio</label>
                <input type="number" name="price" class="form-control" aria-describedby="emailHelp">
                <?php
                $this->controller = new AdminController;
                $this->controller->categoriesForm();
                ?>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </form>
        <?php
        require_once 'templates/footer.php';
    }

    public function showDeleteProds($products)
    {

        require_once('templates/header.php');

        foreach ($products as $product) {
        ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $product->img ?>" class="card-img-top" alt="imageProduct">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product->name ?></h5>
                    <a href="descripcion/<?php echo $product->id ?>" class="btn btn-primary">Ver detalles</a>
                    <?php
                    if (isset($_SESSION['user']) && ($_SESSION['logged'] == true) && ($_SESSION['rol'] == 'admin')) {
                    ?>
                        <a href="eliminarProducto/<?php echo $product->id ?>" class="btn btn-danger">Eliminar producto</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        require_once('templates/footer.php');
    }

    public function showProdsOfUpdated($products)
    {
        //Terminar
    }
    public function showFormAddCategory()
    {

        require_once 'templates/header.php';

        ?>
        <form action="agregarCategoria" method="POST">
            <h2>Agregar Categoria:</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                <label for="exampleInputEmail1">Temporada</label>
                <input type="text" name="season" class="form-control" aria-describedby="emailHelp">
                <?php
                $this->controller = new AdminController;
                $this->controller->categoriesForm();
                ?>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Categoria</button>
        </form>
        <?php
        require_once 'templates/footer.php';
    }
    public function showDeleteCat($categories)
{
    require_once('templates/header.php');
    ?>

    <div class="container mt-4">
        <?php foreach ($categories as $category): ?>
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <strong><?php echo $category->name; ?></strong>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['user']) && ($_SESSION['logged'] == true) && ($_SESSION['rol'] == 'admin')) {
                    ?>
                        <a href="eliminarCategoria/<?php echo $category->id; ?>" class="btn btn-danger">Eliminar categoría</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
    require_once('templates/footer.php');
}


}
