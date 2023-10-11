<?php

class CategoryView {

    public function showAllCategories($categories){
        require_once('templates/header.php');

        foreach($categories as $category) {
            ?>
            <div class="btn-group">
            <button class="btn">Categorias</button>
            <button class="btn dropdown-toggle" data-toggle="dropdown">
             <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
            <ul class = "menú desplegable" role = "menú" aria-labelledby = "menú desplegable" >   
             <li> <a tabindex = "-1" href = "#" > <?php echo $category->name ?> </a></li>  
             <li> <a tabindex = "-1" href = "#" > <?php echo $category->season ?> </a></li>  
            </ul>
            </div>
            <?php
        if(isset($_SESSION['user'])&&($_SESSION['logged'] == true)&&($_SESSION['rol'] == 'admin')){
            ?>
        <a href="eliminar/<?php echo $category->id ?>" class="btn btn-danger">Eliminar categoria</a>
        <?php
        }
    ?>
        </div>
    </div>
<?php 
        }
        
        require_once('templates/footer.php');

    }

    public function showError() {
        echo '<div class="alert alert-error">Error! No se han encontrado categorias</div>';
    }
    

}