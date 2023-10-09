<?php
require_once 'app/model/category.model.php';
require_once 'app/view/category.view.php';

class CategoryController{
    private $model;
    private $view;

    public function __construct(){
        //me aseguro que este logueado
        //AuthHelper::verify();
        session_start();
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }
    public function showAllCategories(){
       
        $categories = $this->model->getAllCategories();
        if(!empty($categories)){

            $this->view->showAllCategories($categories);

        }else{

            $this->view->showError();
        }

    }
    
}