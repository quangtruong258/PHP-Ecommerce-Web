<?php
require_once('config/database.php');
require_once('models/User.php');
class AccountController
{
    private $model;
    function __construct()
    {
        global $pdo;
        $this->model = new User($pdo);
    }
    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $userName = $_POST['username'];
            $pass = $_POST['password'];
            if (empty($userName) || empty($pass)) {
                echo "User Name || PASS IS REQUIED";
                exit;
            }
            $user = $this->model->find($userName);
            if (password_verify($pass, $user['password'])) {
                $_SESSION['userId'] = $user['UserId'];
                $_SESSION['cusName'] = $user['UserName'];
                $_SESSION['avata'] = $user['Avata'];
                $_SESSION['counter'] += 1;
                header("Location: ?=danhsach");
                exit;
            } else {
                $_SESSION['error'] = 'Invalid user!!!';
                header('Location: ?r=login');
                exit;
            }
        }
        require_once('views/account/login.php');
    }
    function logout()
    {
        session_start();
        unset($_SESSION['userName']);
        unset($_SESSION['userId']);
        unset($_SESSION['avata']);
        unset($_SESSION['error']);
        header('Location: ?r=login');
        exit;
    }
    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $userName = $_POST['username'];
            $pass = $_POST['password'];
            $email = $_POST['email'];
            //$confirmPass = $_POST['confirm_pass'];

            // if ($pass != $confirmPass) {
            //     $_SESSION['error'] = "Password and comfirm password are not match!";
            //     header("Location: ?r=register");
            //     exit;
            // }

            $user = $this->model->find($userName);
            if (!empty($user)) {
                $_SESSION['error'] = "User Name is Exists!";
                header("Location: ?r=register");
                exit;
            }

            $hashPass = password_hash($pass, PASSWORD_BCRYPT);

            $isSucess = $this->model->add($userName, $email, $hashPass);
            if ($isSucess) {
                header("Location: ?r=login");
                exit;
            } else {
                $_SESSION['error'] = "Server expected error!";
                header("Location: ?r=register");
                exit;
            }
        }
        require_once('views/account/register.php');
    }
    // function editprofile()
    // {
    //     $id = $_GET['id'];
    //     if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //         $target_dir = "uploads/";
    //         $target_file = $target_dir.basename($_FILES["avata"]["name"]);
    //         $uploadOk = 1;
    //         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //         // Check if image file is a actual image or fake image
    //         if (isset($_POST["submit"])) {
    //             $check = getimagesize($_FILES["avata"]["tmp_name"]);
    //             if ($check !== false) {
    //                 echo "File is an image - " . $check["mime"] . ".";
    //                 $uploadOk = 1;
    //             } else {
    //                 echo "File is not an image.";
    //                 $uploadOk = 0;
    //             }
    //         }
    //         // Check if file already exists
    //         if (file_exists($target_file)) {
    //             echo "Sorry, file already exists.";
    //             $uploadOk = 0;
    //         }
    //         // Check file size
    //         if ($_FILES["avata"]["size"] > 500000) {
    //             echo "Sorry, your file is too large.";
    //             $uploadOk = 0;
    //         }
    //         // Allow certain file formats
    //         if (
    //             $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //             && $imageFileType != "gif"
    //         ) {
    //             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //             $uploadOk = 0;
    //         }
    //         // Check if $uploadOk is set to 0 by an error
    //         if ($uploadOk == 0) {
    //             echo "Sorry, your file was not uploaded.";
    //             // if everything is ok, try to upload file
    //         } else {
    //             if (move_uploaded_file($_FILES["avata"]["tmp_name"], $target_file)) {
    //                 // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    //                 session_start();
    //                 $userId = $_SESSION['userId'];
    //                 $avata = htmlspecialchars(basename($_FILES["avata"]["name"]));
    //                 $isSuccess = $this->model->updateAvata($avata, $userId);
    //                 if ($isSuccess) {
    //                     $_SESSION['avata'] = $avata;
    //                     header("Location: ?");
    //                     exit;
    //                 } else {
    //                     $_SESSION['error'] = "Server's expacted error!";
    //                     header("Location: ?r=error");
    //                     exit;
    //                 }
    //             } else {
    //                 echo "Sorry, there was an error uploading your file.";
    //             }
    //         }
    //     }
    //     require_once('views/edit-profile.php');
    // }
}
?>