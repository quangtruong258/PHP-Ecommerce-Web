<?php
//- tao 1 bieu mau de sinh vien dang ky chuyen nganh
//- hien thi danh sach sau khi dang ky thang cong
//- chinh sua thong tin sau khi dang ky
//- xoa thong tin dang ky
    require_once('routes.php');


    $r = $_GET['r'] ?? '/';


    if (isset($routes[$r])) {


    $controllerName = $routes[$r]['controller'];


    $action = $routes[$r]['action'];

    //kiem tra middleware co ton tai hay kh
    //$middleware = $routes[$r]['middleware'];


    require_once('controllers/' . $controllerName . '.php');


    $controller = new $controllerName();


    //check middleware
    if(isset($routes[$r]['middleware'])){
        session_start();
        if(!isset($_SESSION['empId'])){
            //Chuyen huong qua trang dang nhap
            header('Location: ?r=admin/login');
            exit;
        }
    }
    $controller->$action();
    } else {
    echo "404 Not Found";

    }
