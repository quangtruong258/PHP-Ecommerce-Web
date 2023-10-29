<?php
require_once("config/database.php");
require_once("models/Order.php");

class AdminOrderController
{
    private  $model;
    function __construct()
    {
        global $pdo;
        $this->model = new Order($pdo);
    }


    function getDanhSach()
    {
        $danhsach = $this->model->list_order();
        require_once("views/admin/danhsachorder.php");
    }

    // function editHoa()
    // {
    //     $danhsach = $this->model->list_flower();
    //     require_once("views/admin/edit.php");
    // }

    // function editHoa()
    // {
    //     $maHoa = $_GET['mahoa'];
    //     if (isset($maHoa)) {
    //         $editHoa = $this->model->get_flower($maHoa);
    //         if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //             $isUpdate = $this->model->update(
    //                 $_POST['tenhoa'],
    //                 $_POST['giaban'],
    //                 $maHoa
    //             );
    //             if ($isUpdate) {
    //                 header("Location: ?r=admin/quanlyhoa");
    //                 exit;
    //             } else {
    //                 echo "ERROR UPDATE $maHoa";
    //             }
    //         }
    //         require_once("views/admin/edit.php");
    //     } else {
    //         echo "NOT FOUND!!!";
    //     }
    // }
}


