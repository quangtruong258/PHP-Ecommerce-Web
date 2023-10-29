<?php
require_once("config/database.php");
require_once("models/flower.class.php");


class HomeController{
    private  $model;
    function __construct()
    {
        global $pdo;
        $this->model = new flower($pdo);
        
    }

    function index(){
        $danhsach = $this->model->list_flower();
        require_once ('views/home.php');
    }
    

}


?>