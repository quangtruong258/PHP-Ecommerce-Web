<?php
require_once("config/database.php");
require_once("models/Order.php");



class AdminHomeController{

    private  $model;
    function __construct()
    {
        global $pdo;
        $this->model = new Order($pdo);
    }

    function index(){
        $doanhthuhomnay = $this->model->order_today();
        $doanhthuthang = $this->model->doanhthuthang();
        $slnguoimua = $this->model->soluongnguoimua();

        require_once ('views/admin/home.php');
    }
    

}


?>
