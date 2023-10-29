<?php
require_once("config/database.php");
require_once("models/flower.class.php");




class FlowerController
{
    private  $model;
    function __construct()
    {
        global $pdo;
        $this->model = new flower($pdo);
    }


    function getDanhSach()
    {
        $danhsach = $this->model->list_flower();
        require_once("views/danhsach.php");
    }

    function xemchitiet()
    {
        $maHoa = $_GET['mahoa'];
        if (isset($maHoa)) {
            $flower = $this->model->get_flower($maHoa);
            $hoacungloai = $this->model->list_flower_relate($flower["typeflower_id"],$maHoa);
            require_once('views/xemchitiet.php');
        } else {
            echo "NOT FOUND!!!";
        }
    }

    function addCart()
    {
        // khoiw dong session
        session_start();
        // session_destroy();
        //hien thi loi


        $maHoa = $_GET['mahoa'];
        //them moi san pham vao gio hang
        if (isset($maHoa)) {
            $flower = $this->model->get_flower($maHoa);
            require_once("views/cart.php");
            $pro_id = $_GET['mahoa'];
            //bien xac nhan san pham da ton tai trong gio hang hay chua
            //was_found = true --> sp đã có trong giỏ hàng, tăng sl lên 1
            //was_found =false --> sp chưa có trong giỏ hàng,  thêm sản phẩm, vào giỏ hàng, mặc định số lượng là 1
            $was_found = false;
            $i = 0;
            //kiem tra session dc khoi tao chua
            if (!isset($_SESSION['cart_items']) || count($_SESSION['cart_items']) < 1) {
                $_SESSION['cart_items'] = array(0 => array("pro_id" => $pro_id, "unit" => 1));
            } else {
                //gio hang da dc kho tao
                //duyet tat ca casc sp trong gio hnag
                //neu da ton tai sp thi tangw sl len 1
                //neu chuaw ton tai thi se them moi sp vao gio hang voi sl la1 
                foreach ($_SESSION['cart_items'] as $item) {
                    $i++;
                    // while(list($key,$value)= each($item))
                    foreach ($item as $key => $value) {
                        if ($key == "pro_id" && $value == $pro_id) {
                            //sp da ton tai trong gio hang tang sl len 1
                            array_splice($_SESSION["cart_items"], $i - 1, 1, array(array("pro_id" => $pro_id, "unit" =>
                            $item["unit"] + 1)));
                            $was_found = true;
                        }
                    }
                }
                if ($was_found == false) {
                    array_push($_SESSION["cart_items"], array("pro_id" => $pro_id, "unit" => 1));
                }
            }
            //header("Location: ?r=view-cart");
        }
    }


    function addCart2()
    {
        session_start();
        // Check if product is coming or not
        if (isset($_GET['mahoa'])) {
            $mahoa = $_GET['mahoa'];
            $flower = $this->model->get_flower($mahoa);
            //require_once("views/cart2.php");
            // If session cart is not empty
            if (!empty($_SESSION['cart_items'])) {
                // Using "array_column() function" we get the product id existing in session cart array
                $acol = array_column($_SESSION['cart_items'], 'mahoa');
                // now we compare whther id already exist with "in_array() function"
                if (in_array($mahoa, $acol)) {
                    // Updating quantity if item already exist
                    $_SESSION['cart_items'][$mahoa]['qty'] += 1;
                } else {
                    // If item doesn't exist in session cart array, we add a new item
                    $item = [
                        'mahoa' => $_GET['mahoa'],
                        'qty' => 1,
                        'tenhoa' => $flower['flowerName'],
                        'dongia' => $flower['price'],
                        'anh' => $flower['flowerPicture']
                    ];
                    $_SESSION['cart_items'][$mahoa] = $item;
                }
            } else {
                // If cart is completely empty, then store item in session cart
                $item = [
                    'mahoa' => $_GET['mahoa'],
                    'qty' => 1,
                    'tenhoa' => $flower["flowerName"],
                    'dongia' => $flower["price"],
                    'anh' => $flower["flowerPicture"]
                ];
                $_SESSION['cart_items'][$mahoa] = $item;
            }
            header("Location: ?r=viewcart");
            exit;
        } else {
            header("Location: ?r=error");
            exit;
        }
    }
    function emptyCart()
    {
        session_start();
        unset($_SESSION['cart_items']);
        header("Location: ?r=viewcart");
        exit;
    }

    // function deleteCartItem()
    // {
    //     session_start();
    //     if (isset($_GET['mahoa'])) {
    //         $mahoa = $_GET['mahoa'];
    //         unset($_SESSION['cart_items']);
    //         //header("Location: ?r=view-cart");
    //         exit;
    //     }
    // }

    function viewCart()
    {
        require_once("views/cart2.php");
    }


    function timkiemhoa(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $keyword = $_POST["keyword"];
            if(isset($keyword)){
                $danhsachtimkiem = $this->model->timkiemhoa($keyword);
            
            }
            if(!isset($danhsachtimkiem)){
                echo "NOT FOUND";
            }
            require_once("views/danhsachtimkiem.php");
        }
        
    }

    // function cartUpdate()
    // {
    //     session_start();

    //     if ($_POST['update']) {
    //         $maHoa = $_POST['maHoa'];
    //         $acol = array_column($_SESSION['cart_items'], 'mahoa');
    //         if (in_array($_POST['mahoa'], $acol)) {
    //             $_SESSION['cart_items'][$maHoa]['soluong'] = $_POST['soluong'];
    //         } else {
    //             $item = [
    //                 'mahoa' => $maHoa,
    //                 'soluong' => 1
    //             ];
    //             $_SESSION['cart_items'][$maHoa] = $item;
    //         }
    //         header("Location: ?r=viewcart");
    //         exit;
    //     }
    // }


   
}
