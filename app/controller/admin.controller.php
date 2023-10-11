<?php

    require_once 'app/model/admin.model.php';
    require_once 'app/helpers/auth.helpers.php';
    require_once 'app/view/product.view.php';
    require_once 'app/view/admin.view.php';
    require_once 'app/model/category.model.php';
class AdminController {


    private $model;
    private $view;
    private $productView;
    private $AdminView;
    private $modelCategories;

    public function __construct(){

        $this->model = new AdminModel();
        $this->productView = new ProductView();
        $this->view = new AuthView();
        $this->AdminView = new AdminView();
        $this->modelCategories = new CategoryModel();
        }

    public function showListProds(){

        $products = $this->model->getAllProducts();
        if(!empty($products)){

            $this->productView->showAllProducts($products);

        }
    }

    public function showFormAddProduct(){

        $this->AdminView->showFormAddProduct();

    }

    public function showDeleteProds(){


        $products = $this->model->getAllProducts();

        if(!empty($products)){
        $this->AdminView->showDeleteProds($products);
        }
    }

    public function deleteProductById($id){

    $this->model->deleteProductById($id);
    header("Location:" . BASE_URL);
        
    }

    public function categoriesForm(){
        ?>
        <label for="category">Categoría:</label>
                        <select name="category" id="category">
            <?php
            
                //traerme todas las categorias para matchearla con la fk
                $categories = $this->modelCategories->getAllCategories();
                    foreach ($categories as $category) {
                echo "<option value='" . $category->id . "'>" . $category->season . "</option>";
            }
            ?>
        </select>
        <?php
    }


    public function addProduct(){

        $img = $_POST['img'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if(!empty($img)||!empty($name)||!empty($description)||!empty($price)||!empty($category)){

            $this->model->addProduct($img, $name, $description, $price, $category);
            header("Location:" . BASE_URL);
        }else{
            $this->view->showError();
        }

    }


}