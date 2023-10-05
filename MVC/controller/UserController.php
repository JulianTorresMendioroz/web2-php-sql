<?php 

require_once 'MVC/model/UserModel.php';
require_once 'MVC/controller/controller.php';

class UserController extends Controller{

    private $model;
    //private $view;

    public function __construct(){
        parent::__construct();
        $this->model = new UserModel($this->user);
        //$this->view = new UserView($this->user);

    }

    public function registered(){

        if(!empty($_POST['user'])&& !empty($_POST['password'])){

            $user = $_POST['user'];

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $this->model->registeredUser($user, $password);

         }else {

            header("Location: home");

         }
    }

    public function logged(){

    if(!empty($_POST['user'])&& !empty($_POST['password'])){

        $user = $_POST['user'];
        $password = $_POST['password'];
        $userData = $this->model->loggedUser($user);
        
        if($userData && password_verify($password,($userData->password))){

             session_start();
             $_SESSION['logged'] = true;
             $_SESSION['user'] = $user;

            if(isset($_SESSION["logged"]) && $_SESSION["user"] == true) {
                
                header("Location: home");

            } else {

                echo "Acceso denegado";
                }
            }
        }
    }

    public function logout(){

        session_start();
        session_destroy();
        header("Location: " . BASE_URL);

    }
}