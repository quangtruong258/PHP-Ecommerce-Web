<?php
require_once("config/database.php");
require_once("models/Order.php");
require_once("models/OrderDetails.php");


class CartController
{

    private  $model;
    function __construct()
    {
        global $pdo;
        $this->model = new Order($pdo);
    }

    function ordercomplete()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['userId'])) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $createDay = $date = date('Y/m/d H:i:s');
                $this->model->add($createDay, $_SESSION['total_money'], $_SESSION['userId']);
            } else {
                header('Location: ?r=login');
            }
            unset($_SESSION["cart_items"]);
            header('Location: ?r=ordersuccess');
        } else {
            echo "Can  Save!!!";
        }




        //require("views/orderpage.php");
    }

    function ordersuccess(){
        // unset($_SESSION["cart_items"]);
        require_once('views/ordersuccess.php');
    }
}
