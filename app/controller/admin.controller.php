<?php

require_once 'app/model/admin.model.php';
require_once 'app/helpers/auth.helpers.php';
require_once 'app/view/product.view.php';
require_once 'app/view/admin.view.php';
require_once 'app/model/category.model.php';
require_once 'app/view/category.view.php';

class AdminController
{


    private $model;
    private $view;
    private $productView;
    private $AdminView;
    private $modelCategories;
    private $categoryView;

    public function __construct()
    {

        $this->model = new AdminModel();
        $this->productView = new ProductView();
        $this->categoryView = new CategoryView();
        $this->view = new AuthView();
        $this->AdminView = new AdminView();
        $this->modelCategories = new CategoryModel();
    }

    public function showListProds()
    {

        $products = $this->model->getAllProducts();
        if (!empty($products)) {

            $this->productView->showAllProducts($products);
        }
    }

    public function showFormAddProduct()
    {

        $this->AdminView->showFormAddProduct();
    }

    public function showDeleteProds()
    {


        $products = $this->model->getAllProducts();

        if (!empty($products)) {
            $this->AdminView->showDeleteProds($products);
        }
    }

    public function deleteProductById($id)
    {

        $this->model->deleteProductById($id);
        header("Location:" . BASE_URL);
    }

    public function categoriesForm()
    {
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


    public function addProduct()
    {
        // Verificar si las claves existen en $_POST y asignar
        $img = isset($_POST['img']) ? $_POST['img'] : null;
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $price = isset($_POST['price']) ? $_POST['price'] : null;
        $category = isset($_POST['category']) ? $_POST['category'] : null;
    
        // Verificar que ningún campo esté vacío
        if (!empty($img) && !empty($name) && !empty($description) && !empty($price) && !empty($category)) {
            $this->model->addProduct($img, $name, $description, $price, $category);
            header("Location:" . BASE_URL);
        } else {
            $this->view->showError();
        }
    }
    
    public function showListCat()
    {

        $categories = $this->model->AllCategory();
        if (!empty($categories)) {

            $this->categoryView->showAllCategories($categories);
        }
    }
    public function showFormAddCategory()
    {

        $this->AdminView->showFormAddCategory();
    }
    public function deleteCategoryById($id)
    {

        $this->model->deleteCategoryById($id);
        header("Location:" . BASE_URL);
    }
    public function addCategory()
    {

        $name = $_POST['name'];
        $season = $_POST['season'];

        if (!empty($name) || !empty($season)) {

            $this->model->addCategory($name, $season);
            header("Location:" . BASE_URL);
        } else {
            $this->view->showError();
        }
    }
    public function showDeleteCat()
    {

<<<<<<< HEAD
}
=======

        $categories = $this->model->AllCategory();

        if (!empty($categories)) {
            $this->AdminView->showDeleteCat($categories);
        }
    }
}
>>>>>>> 521e86da14f1bf704e9fc93ebab47a9a41fde41c
