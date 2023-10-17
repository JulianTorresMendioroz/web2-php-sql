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
    private $AdminView;
    private $modelCategories;
    private $categoryView;


    public function __construct()
    {
        $this->model = new AdminModel();
        $this->view = new AuthView();
        $this->modelCategories = new CategoryModel();

    }

    public function showListProds(){
        $products = $this->model->getAllProducts();
        if (!empty($products)) {
            require_once 'templates/products.phtml';
        }else{
            $this->view->showError('No hay productos disponibles');
        }
    }

    public function showFormAddProduct(){
    require_once 'templates/add_product_admin.phtml';
    }

    public function showDeleteProds()
    {
        $products = $this->model->getAllProducts();

        if (!empty($products)) {
            require_once 'templates/delete_products_admin.phtml';
        }else{
            $this->view->showError('No hay productos para eliminar');
        }
    }

    public function deleteProductById($id)
    {
        $this->model->deleteProductById($id);
        header("Location:" . BASE_URL);
    }

    public function categoriesForm(){
        require_once './templates/add_product_with_category.phtml';
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
            $this->view->showError('No se pudo añadir el producto');
        }
    }

    public function showAllUpdatedProduct(){
        $products = $this->model->getAllProducts();
        if(!empty($products)){
            require_once './templates/updated_products_admin.phtml';
        }else{
            $this->view->showError('No se pudo actualizar el producto');
        }
    }

    public function showDescriptionProductUpdated($id){
        $product = $this->model->getProductById($id);
        if(!empty($product)){
            require_once './templates/description_product_admin.phtml';
        }else{
            $this->view->showError('No se pudo actualizar el producto');
        }
    }
    
    public function updateProduct($name, $description, $price, $id){

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $id = $_POST['id'];


        if(!empty($name)||!empty($description)||!empty($price)||!empty($id)){
            $this->model->updateProduct($name, $description, $price, $id);
            header("Location:" . BASE_URL);
        }else{
            $this->view->showError('No se pudo actualizar');
        }
    }

    //CATEGORY
    
    public function showListCat()
    {

        $categories = $this->model->AllCategory();
        if (!empty($categories)) {
            require_once 'templates/category.phtml';
        }
        else{
            $this->view->showError('No hay categorias disponibles');
        }
    }
    public function showFormAddCategory()
    {
        require_once 'templates/add_category_admin.phtml';
       
    }
    public function showdeleteCategoryById($id)
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
            //feli tenes que añadir este error donde haya condiciones de if, con un mensaje para 
            //mostrarle al usuario en caso de que no se cumpla la condicion
            $this->view->showError('No se pudo agregar categoria');
        }
    }
    public function showDeleteCat()
    {
        $categories = $this->model->AllCategory();

        if (!empty($categories)) {
            $this->AdminView->showDeleteCat($categories);
        }
        $this->view->showError('No hay categorias');
    }
    public function showAllUpdatedCategories(){
        $products = $this->model->AllCategory();
        if(!empty($products)){
            require_once './templates/updated_products_admin.phtml';
        }else{
            $this->view->showError('No se pudo actualizar el producto');
        }
    }
    public function updateCategory($id,$name,$season){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $season = $_POST['season'];


        if(!empty($id)||!empty($name)||!empty($season)){
            $this->model->updateCategory($id, $name, $season);
            header("Location:" . BASE_URL);
        }else{
            $this->view->showError('No se pudo actualizar');
        }
    }
}

