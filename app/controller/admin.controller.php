<?php

    require_once 'app/model/admin.model.php';
    require_once 'app/helpers/auth.helpers.php';

class AdminController {


    private $model;
    private $view;

    public function __construct(){

        $this->model = new AdminModel();
        //CAMBIAR
        //$this->view = new AdminView();
        $this->view = new AuthView();
    }

    public function deleteProductById($id){

    $this->model->deleteProductById($id);
    header("Location:" . BASE_URL);
        
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