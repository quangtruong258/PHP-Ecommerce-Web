<?php
require_once("config/database.php");
require_once("models/typeflower.class.php");



class TypeFlowerController{
    private  $model;
    function __construct()
    {
        global $pdo;
        $this->model = new Typeflower($pdo);
        
    }


    function getDanhSachLoaiHoa(){
        $danhsachloaihoa = $this->model->list_typeflower();
        require_once("views/danhsach.php");
    }
  



}



?>