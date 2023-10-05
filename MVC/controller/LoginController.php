<?php 

require_once 'MVC/view/LoginView.php';
require_once 'MVC/controller/controller.php';

class LoginController extends Controller{

    private $view;


    public function __construct(){
        parent::__construct();
        $this->view = new AuthView($this->user);
    }

    public function showLogin(){

        $this->view->login();

    }

   public function showRegister(){

        $this->view->register();

    }
    
    

} 

