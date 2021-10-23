<?php 

    include '../controller/ProductController.php';

    $action = $_POST['action'];

    switch($action){
        //module categories
        case 'getCategories':
            echo GetCategories();
            break;
        case 'updateStateCategory':
            echo UpdateStateCategory();
            break;
        case 'updateCategory':
            echo UpdateCategory();
            break;
        case 'insertCategory':
            echo InsertCategory();
            break;
        case 'getCategoryById':
            echo GetCategoryById();
            break;
        //module unities
        case 'getUnities':
            echo GetUnity();
            break;
        case 'updateStateUnity':
            echo UpdateStateUnity();
            break;
        case 'updateUnity':
            echo UpdateUnity();
            break;
        case 'insertUnity':
            echo InsertUnity();
            break;
        case 'getUnityById':
            echo GetUnityById();
            break;
        default:
            break;
    }

    //module unities
    function GetUnity(){
        $ProductController = new ProductController();
        return json_encode($ProductController->GetUnityController());
    }

    function UpdateStateUnity(){
        $ProductController = new ProductController();
        return json_encode($ProductController->UpdateStateUnityController($_POST['state'], $_POST['id']));
    }

    function UpdateUnity(){
        $ProductController = new ProductController();
        $data = array(
            "nombre" => $_POST['nombre'],
            "descripcion" => $_POST['descripcion']
        );
        return json_encode($ProductController->UpdateUnityController($data, $_POST['id']));
    }

    function InsertUnity(){
        $ProductController = new ProductController();
        $data = array(
            "nombre" => $_POST['nombre'],
            "descripcion" => $_POST['descripcion']
        );
        return json_encode($ProductController->InsertUnityController($data));
    }

    function GetUnityById(){
        $ProductController = new ProductController();
        return json_encode($ProductController->GetUnityByIdController($_POST['id']));
    }

    //module categories
    function GetCategories(){
        $ProductController = new ProductController();
        return json_encode($ProductController->GetCategoriesController());
    }

    function GetCategoryById(){
        $ProductController = new ProductController();
        return json_encode($ProductController->GetCategoryByIdController($_POST['id']));
    }

    function UpdateStateCategory(){
        $ProductController = new ProductController();
        return json_encode($ProductController->UpdateStateCategoryController($_POST['state'], $_POST['id']));
    }

    function UpdateCategory(){
        $ProductController = new ProductController();
        $data = array(
            "nombre" => $_POST['nombre'],
            "descripcion" => $_POST['descripcion']
        );
        return json_encode($ProductController->UpdateCategoryController($data, $_POST['id']));
    }

    function InsertCategory(){
        $ProductController = new ProductController();
        $data = array(
            "nombre" => $_POST['nombre'],
            "descripcion" => $_POST['descripcion']
        );
        return json_encode($ProductController->InsertCategoryController($data));
    }