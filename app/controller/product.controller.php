<?php

require_once 'app/model/product.model.php';
require_once 'app/view/product.view.php';
require_once 'app/helpers/auth.helpers.php';
require_once 'app/model/category.model.php';

class ProductController{

    private $model;
    private $view;
    private $categoryModel;
    private $cfk;

    public function __construct(){
        //me aseguro que este logueado
        //AuthHelper::verify();
        session_start();
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->categoryModel = new CategoryModel();
        }

    public function showAllProducts(){
       
        $products = $this->model->getAllProducts();
        if(!empty($products)){

            $this->view->showAllProducts($products);


        }else{

            echo "Error: No hay productos en la DB";

        }

    }

    public function showDescriptionProduct($id){

        $product = $this->model->getProductById($id);
    
        if($product){

            $this->view->showDescriptionProduct($product);    


        }else{

            echo "Error: No hay productos en la DB para mostrar";

        }
    }

    public function showCategorySeason($id){

        $season = $this->model->getCategoryId($id);
        var_dump($season);

    }
}