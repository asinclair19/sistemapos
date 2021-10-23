<?php 

    include '../controller/StoreController.php';

    $action = $_POST['action'];

    switch($action){
        //module suppliers
        case 'getSuppliers':
            echo GetSupplier();
            break;
        case 'updateStateSupplier':
            echo UpdateStateSupplier();
            break;
        case 'updateSupplier':
            echo UpdateSupplier();
            break;
        case 'insertSupplier':
            echo InsertSupplier();
            break;
        case 'getSupplierById':
            echo GetSupplierById();
            break;
        default:
            break;
    }

    //module unities
    function GetSupplier(){
        $StoreController = new StoreController();
        return json_encode($StoreController->GetSupplierController());
    }

    function UpdateStateSupplier(){
        $StoreController = new StoreController();
        return json_encode($StoreController->UpdateStateSupplierController($_POST['state'], $_POST['id']));
    }

    function UpdateSupplier(){
        $StoreController = new StoreController();
        $data = array(
            "nombre" => $_POST['nombre'],
            "contacto" => $_POST['contacto'],
            "direccion" => $_POST['direccion'],
            "ciudad" => $_POST['ciudad'],
            "region" => $_POST['region'],
            "codigo_postal" => $_POST['codigo_postal'],
            "pais" => $_POST['pais'],
            "celular" => $_POST['celular']
        );
        return json_encode($StoreController->UpdateSupplierController($data, $_POST['id']));
    }

    function InsertSupplier(){
        $StoreController = new StoreController();
        $data = array(
            "nombre" => $_POST['nombre'],
            "contacto" => $_POST['contacto'],
            "direccion" => $_POST['direccion'],
            "ciudad" => $_POST['ciudad'],
            "region" => $_POST['region'],
            "codigo_postal" => $_POST['codigo_postal'],
            "pais" => $_POST['pais'],
            "celular" => $_POST['celular']
        );
        return json_encode($StoreController->InsertSupplierController($data));
    }

    function GetSupplierById(){
        $StoreController = new StoreController();
        return json_encode($StoreController->GetSupplierByIdController($_POST['id']));
    }