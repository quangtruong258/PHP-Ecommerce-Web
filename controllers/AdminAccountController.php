<?php
require_once('config/database.php');
require_once('models/Emp.php');

class AdminAccountController{

    private $model;
    function __construct()
    {
        global $pdo;
        $this->model = new Emp($pdo);
    }
    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $userName = $_POST['username'];
            $pass = $_POST['password'];
            $empName = $_POST['name'];
            $confirmPass = $_POST['confirm_pass'];

            if ($pass != $confirmPass) {
                $_SESSION['error'] = "Password and comfirm password are not match!";
                header("Location: ?r=admin/register");
                exit;
            }

            $user = $this->model->find($userName);
            if (!empty($user)) {
                $_SESSION['error'] = "User Name is Exists!";
                header("Location: ?r=admin/register");
                exit;
            }

            $hashPass = password_hash($pass, PASSWORD_BCRYPT);

            $isSucess = $this->model->add($empName,$userName, $hashPass);
            if ($isSucess) {
                header("Location: ?r=admin/login");
                exit;
            } else {
                $_SESSION['error'] = "Server expected error!";
                header("Location: ?r=admin/register");
                exit;
            }
        }
        require_once('views/admin/register.php');
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
            if (password_verify($pass, $user['Pass'])) {
                $_SESSION['empId'] = $user['emp_Id'];
                $_SESSION['empName'] = $user['empName'];
                $_SESSION['avata'] = $user['Avata'];
                header("Location: ?r=admin");
                exit;
            } else {
                $_SESSION['error'] = 'Invalid user!!!';
                header('Location: ?r=admin/login');
                exit;
            }
        }
        require_once('views/admin/login.php');
    }

    function logout()
    {
        session_start();
        unset($_SESSION['empName']);
        unset($_SESSION['empId']);
        unset($_SESSION['avata']);
        unset($_SESSION['error']);
        header('Location: ?r=admin/login');
        exit;
    }
}
?>