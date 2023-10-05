<?php

require_once 'MVC/model/ProductModel.php';
require_once 'MVC/view/ProductView.php';
require_once 'MVC/controller/controller.php';

class ProductController extends Controller{

    private $model;
    private $view;

    public function __construct(){

        //llama al constructor de la clase controller
        parent::__construct();
        $this->model = new ProductModel();
        //le paso el usuario 
        $this->view = new ProductView($this->user);

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
}