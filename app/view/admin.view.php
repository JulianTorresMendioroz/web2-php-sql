<?php 



class AdminView {
    
    //TERMINAR!!

    public function showFormAddProduct(){
        
        require_once 'templates/header.php';
        
        ?>
                <form action="agregar" method="POST">
                    <h2>Agregar Producto:</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Imagen</label>
                        <input type="text" name="img" class="form-control"  aria-describedby="emailHelp">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="name" class="form-control"  aria-describedby="emailHelp">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="text" name="description" class="form-control"  aria-describedby="emailHelp">
                        <label for="exampleInputEmail1">Precio</label>
                        <input type="number" name="price" class="form-control"  aria-describedby="emailHelp">
                        <label for="category">Categoría:</label>
                        <select name="category" id="category">
            <?php
            
                //traerme todas las categorias para matchearla con la fk
                //$categories = allCategory();
                    foreach ($categories as $category) {
                echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
            }
            ?>
        </select>
                   
                </div>
                   
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </form>
                <?php
                require_once 'templates/footer.php';
            


    }



}