<?php 

    include '../controller/UserController.php';

    $action = $_POST['action'];

    switch($action){
        case 'login':
            echo LogIn();
            break;
        case 'logOut':
            echo LogOut();
            break;
        default:
            break;
    }

    function LogIn(){
        
        $UserController = new UserController();

        if(isset($_POST['username']) && isset($_POST['pass'])){
            return json_encode($UserController->LogIn($_POST['username'], $_POST['pass']));
        }
    }

    function LogOut(){
        $UserController = new UserController();
        return json_encode($UserController->LogOut());
    }