<?php
require_once("config/database.php");
require_once("models/flower.class.php");




class AdminFlowerController
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
        require_once("views/admin/danhsach.php");
    }

    // function editHoa()
    // {
    //     $danhsach = $this->model->list_flower();
    //     require_once("views/admin/edit.php");
    // }

    function editHoa()
    {
        $maHoa = $_GET['mahoa'];
        if (isset($maHoa)) {
            $editHoa = $this->model->get_flower($maHoa);
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $isUpdate = $this->model->update(
                    $_POST['tenhoa'],
                    $_POST['giaban'],
                    $maHoa
                );
                if ($isUpdate) {
                    header("Location: ?r=admin/quanlyhoa");
                    exit;
                } else {
                    echo "ERROR UPDATE $maHoa";
                }
            }
            require_once("views/admin/edit.php");
        } else {
            echo "NOT FOUND!!!";
        }
    }

    function addHoa(){


        // $filetemp = $flowerPicture['tmp_name'];
        // $user_file = $this->flowerPicture['name'];
        // $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
        // $filepath = "uploads/".$timestamp.$user_file;
        // if(move_uploaded_file($filetemp, $filepath)==false){
        //     return false;
        // }







       
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $price = $_POST['giaban'];
            $tenHoa = $_POST['tenhoa'];
            $loai = $_POST['loai'];

            $filetemp = $_FILES["anhhoa"]["tmp_name"];
            $user_file = $_FILES["anhhoa"]["name"];
            $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
            $filepath = "uploads/".$timestamp.$user_file;



            
            // $target_dir = "uploads/";
            // $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
            
            // $filepath = "uploads/".$timestamp.$user_file.$imageFileType;
            // $target_file = $filepath;
            // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          
            
            // $uploadOk = 1;
            
            // // Check if image file is a actual image or fake image
            // if (isset($_POST["submit"])) {
            //     $check = getimagesize($_FILES["avata"]["tmp_name"]);
            //     if ($check !== false) {
            //         echo "File is an image - " . $check["mime"] . ".";
            //         $uploadOk = 1;
            //     } else {
            //         echo "File is not an image.";
            //         $uploadOk = 0;
            //     }
            // }
            // // Check if file already exists
            // if (file_exists($target_file)) {
            //     echo "Sorry, file already exists.";
            //     $uploadOk = 0;
            // }
            // // Check file size
            // if ($_FILES["anhhoa"]["size"] > 500000) {
            //     echo "Sorry, your file is too large.";
            //     $uploadOk = 0;
            // }
            // // Allow certain file formats
            // if (
            //     $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            //     && $imageFileType != "gif"
            // ) {
            //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            //     $uploadOk = 0;
            // }
            // // Check if $uploadOk is set to 0 by an error
            // if ($uploadOk == 0) {
            //     echo "Sorry, your file was not uploaded.";
            //     // if everything is ok, try to upload file
            // } else {
                if (move_uploaded_file($filetemp, $filepath)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    //session_start();
                    
                    $anhhoa = htmlspecialchars(basename($_FILES["anhhoa"]["name"]));
                    $isSuccess = $this->model->save($tenHoa, $price,$filepath,$loai);
                    if ($isSuccess) {
                        //$_SESSION['avata'] = $avata;
                        header("Location: ?r=admin/quanlyhoa");
                        exit;
                    } else {
                        $_SESSION['error'] = "Server's expacted error!";
                        header("Location: ?r=error");
                        exit;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            // }
        }
        require_once("views/admin/addhoa.php");

    }
}
