<?php 

class Controller {

    protected $user = null;

    public function __construct()
    {
        session_start();
        if(isset($_SESSION["logged"]) && $_SESSION["user"] == true){

            $this->user = true;

        }else {


            
        }
               
    }



}